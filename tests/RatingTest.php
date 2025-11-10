<?php

use Jodeveloper\FilamentRating\Forms\Components\Rating;

it('can render rating component', function () {
    $component = Rating::make('rating')
        ->options([
            '1' => 'Poor',
            '2' => 'Fair',
            '3' => 'Good',
            '4' => 'Very Good',
            '5' => 'Excellent'
        ]);

    expect($component->getName())->toBe('rating');
    expect($component->getOptions())->toBe([
        '1' => 'Poor',
        '2' => 'Fair',
        '3' => 'Good',
        '4' => 'Very Good',
        '5' => 'Excellent'
    ]);
});

it('can set icons for rating options', function () {
    $icons = [
        '1' => '<svg>...</svg>',
        '2' => '<svg>...</svg>',
        '3' => '<svg>...</svg>',
        '4' => '<svg>...</svg>',
        '5' => '<svg>...</svg>',
    ];

    $component = Rating::make('rating')
        ->options([
            '1' => 'Poor',
            '2' => 'Fair',
            '3' => 'Good',
            '4' => 'Very Good',
            '5' => 'Excellent'
        ])
        ->icons($icons);

    expect($component->getIcons())->toBe($icons);
});

it('can set default color for rating options', function () {
    $component = Rating::make('rating')
        ->options([
            '1' => 'Poor',
            '2' => 'Fair',
            '3' => 'Good',
            '4' => 'Very Good',
            '5' => 'Excellent'
        ])
        ->defaultColor('yellow');

    expect($component->getDefaultColor())->toBe('yellow');
});

it('can set individual colors for rating options', function () {
    $colors = [
        '1' => 'red',
        '2' => 'orange',
        '3' => 'yellow',
        '4' => 'lime',
        '5' => 'green',
    ];

    $component = Rating::make('rating')
        ->options([
            '1' => 'Poor',
            '2' => 'Fair',
            '3' => 'Good',
            '4' => 'Very Good',
            '5' => 'Excellent'
        ])
        ->colors($colors);

    expect($component->getColors())->toBe($colors);
});

it('can get color for specific option', function () {
    $colors = [
        '1' => 'red',
        '5' => 'green',
    ];

    $component = Rating::make('rating')
        ->options([
            '1' => 'Poor',
            '2' => 'Fair',
            '3' => 'Good',
            '4' => 'Very Good',
            '5' => 'Excellent'
        ])
        ->colors($colors)
        ->defaultColor('blue');

    expect($component->getColorForOption('1'))->toBe('red');
    expect($component->getColorForOption('5'))->toBe('green');
    expect($component->getColorForOption('3'))->toBe('blue'); // Should use default color
});

it('can set show label option', function () {
    $component = Rating::make('rating')
        ->options([
            '1' => 'Poor',
            '2' => 'Fair',
            '3' => 'Good',
            '4' => 'Very Good',
            '5' => 'Excellent'
        ])
        ->showLabel(false);

    expect($component->getShowLabel())->toBeFalse();
});

it('can set inline option', function () {
    $component = Rating::make('rating')
        ->options([
            '1' => 'Poor',
            '2' => 'Fair',
            '3' => 'Good',
            '4' => 'Very Good',
            '5' => 'Excellent'
        ])
        ->inline(false);

    expect($component->getInline())->toBeFalse();
});
