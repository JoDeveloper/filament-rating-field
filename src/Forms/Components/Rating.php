<?php

namespace Jodeveloper\FilamentRating\Forms\Components;

use Filament\Forms\Components\Radio;
use Closure;

class Rating extends Radio
{
    protected string $view = 'filament-rating::forms.components.rating';

    protected array | Closure $icons = [];

    protected array | Closure $colors = [];

    protected string | Closure | null $defaultColor = null;

    protected bool | Closure $showLabel = true;

    protected bool | Closure $inline = true;

    /**
     * Set the icons for the rating options.
     */
    public function icons(array | Closure $icons): static
    {
        $this->icons = $icons;

        return $this;
    }

    /**
     * Set the colors for the rating options (individual colors for each option).
     */
    public function colors(array | Closure $colors): static
    {
        $this->colors = $colors;

        return $this;
    }

    /**
     * Set the default color for the rating options (used when no individual color is set).
     */
    public function defaultColor(string | Closure | null $defaultColor): static
    {
        $this->defaultColor = $defaultColor;

        return $this;
    }

    /**
     * Set the color for the rating options (alias for defaultColor).
     */
    public function color(string | Closure | null $color): static
    {
        return $this->defaultColor($color);
    }

    /**
     * Set whether to show the label.
     */
    public function showLabel(bool | Closure $showLabel = true): static
    {
        $this->showLabel = $showLabel;

        return $this;
    }

    /**
     * Set whether the options should be displayed inline.
     */
    public function inline(bool | Closure $inline = true): static
    {
        $this->inline = $inline;

        return $this;
    }

    /**
     * Get the icons for the rating options.
     */
    public function getIcons(): array
    {
        $icons = $this->evaluate($this->icons, [
            'options' => $this->getOptions(),
        ]);

        return is_array($icons) ? $icons : [];
    }

    /**
     * Get the colors for the rating options.
     */
    public function getColors(): array
    {
        $colors = $this->evaluate($this->colors, [
            'options' => $this->getOptions(),
        ]);

        return is_array($colors) ? $colors : [];
    }

    /**
     * Get the default color for the rating options.
     */
    public function getDefaultColor(): ?string
    {
        return $this->evaluate($this->defaultColor);
    }

    /**
     * Get the color for a specific rating option.
     */
    public function getColorForOption(string $value): ?string
    {
        $colors = $this->getColors();
        
        if (isset($colors[$value])) {
            return $colors[$value];
        }
        
        return $this->getDefaultColor();
    }

    /**
     * Get whether to show the label.
     */
    public function getShowLabel(): bool
    {
        return $this->evaluate($this->showLabel);
    }

    /**
     * Get whether the options should be displayed inline.
     */
    public function getInline(): bool
    {
        return $this->evaluate($this->inline);
    }

    /**
     * Check if a specific option is selected.
     */
    public function isSelected(string $value): bool
    {
        return $this->evaluate(function () use ($value) {
            return $this->getState() == $value;
        });
    }
}
