<?php

namespace Jodeveloper\FilamentRating\Utils;

use InvalidArgumentException;

class ColorUtils
{
    private const AA_NORMAL_THRESHOLD = 4.5;
    private const AA_LARGE_THRESHOLD = 3.0;
    private const AAA_THRESHOLD = 7.0;

    /**
     * Determine best text color (black or white) based on luminance
     */
    public static function getOptimalTextColor(string|null $backgroundColor): string
    {
      if(is_null($backgroundColor)) {
          return '#000000';
        }

        $rgb = self::hexToRgbOrFail($backgroundColor);
        $luminance = self::calculateLuminance($rgb);

        return $luminance > 0.5 ? '#000000' : '#FFFFFF';
    }

    /**
     * Calculate contrast ratio between two colors
     */
    public static function calculateContrastRatio(string $color1, string $color2): float
    {
        $rgb1 = self::hexToRgbOrFail($color1);
        $rgb2 = self::hexToRgbOrFail($color2);

        $l1 = self::calculateLuminance($rgb1);
        $l2 = self::calculateLuminance($rgb2);

        $lighter = max($l1, $l2);
        $darker = min($l1, $l2);

        return ($lighter + 0.05) / ($darker + 0.05);
    }

    /**
     * WCAG compliance info
     */
    public static function getComplianceInfo(string $backgroundColor, string $textColor): array
    {
        $contrast = self::calculateContrastRatio($backgroundColor, $textColor);

        return [
            'contrast_ratio' => $contrast,
            'aa_large' => $contrast >= self::AA_LARGE_THRESHOLD,
            'aa_normal' => $contrast >= self::AA_NORMAL_THRESHOLD,
            'aaa_large' => $contrast >= self::AA_NORMAL_THRESHOLD, // same as AA normal
            'aaa_normal' => $contrast >= self::AAA_THRESHOLD,
            'recommendation' => self::getRecommendation($contrast),
        ];
    }

    /**
     * Alternative text color suggestions
     */
    public static function getTextColorOptions(string $backgroundColor): array
    {
        $optimal = self::getOptimalTextColor($backgroundColor);

        $variations = $optimal === '#FFFFFF'
            ? [
                '#FFFFFF' => 'Pure White',
                '#F5F5F5' => 'Off-White',
                '#E0E0E0' => 'Light Gray',
                '#CCCCCC' => 'Medium Light Gray'
            ]
            : [
                '#000000' => 'Pure Black',
                '#1A1A1A' => 'Near Black',
                '#333333' => 'Dark Gray',
                '#666666' => 'Medium Dark Gray'
            ];

        $options = [];
        foreach ($variations as $color => $name) {
            $info = self::getComplianceInfo($backgroundColor, $color);
            $options[$color] = [
                'name' => $name,
                'contrast' => $info['contrast_ratio'],
                'compliant' => $info['aa_normal'],
                'recommendation' => $info['recommendation'],
            ];
        }

        return $options;
    }

    /**
     * Convert hex to RGB array or throw exception
     */
    private static function hexToRgbOrFail(string $hex): array
    {
        $rgb = self::hexToRgb($hex);

        if (!$rgb) {
            throw new InvalidArgumentException(
                "Invalid hex color '{$hex}'. Use #RRGGBB or #RGB format."
            );
        }

        return $rgb;
    }

    /**
     * Hex → RGB
     */
    private static function hexToRgb(string $hex): ?array
    {
        $hex = ltrim($hex, '#');

        if (strlen($hex) === 3) {
            $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
        }

        if (!ctype_xdigit($hex) || strlen($hex) !== 6) {
            return null;
        }

        return [
            'r' => hexdec(substr($hex, 0, 2)),
            'g' => hexdec(substr($hex, 2, 2)),
            'b' => hexdec(substr($hex, 4, 2)),
        ];
    }

    /**
     * Calculate relative luminance
     */
    private static function calculateLuminance(array $rgb): float
    {
        $linear = fn ($v) => ($v <= 0.03928)
            ? $v / 12.92
            : pow(($v + 0.055) / 1.055, 2.4);

        $r = $linear($rgb['r'] / 255);
        $g = $linear($rgb['g'] / 255);
        $b = $linear($rgb['b'] / 255);

        return 0.2126 * $r + 0.7152 * $g + 0.0722 * $b;
    }

    /**
     * Text accessibility recommendation
     */
    private static function getRecommendation(float $contrast): string
    {
        return match (true) {
            $contrast >= self::AAA_THRESHOLD => 'AAA compliant - Excellent contrast',
            $contrast >= self::AA_NORMAL_THRESHOLD => 'AA compliant - Good contrast',
            $contrast >= self::AA_LARGE_THRESHOLD => 'AA compliant for large text only',
            default => 'Poor contrast - Consider alternative colors',
        };
    }
}
