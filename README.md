# Filament Rating Field

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jodeveloper/filament-rating.svg?style=flat-square)](https://packagist.org/packages/jodeveloper/filament-rating)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/jodeveloper/filament-rating/run-tests?label=tests)](https://github.com/jodeveloper/filament-rating/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/jodeveloper/filament-rating/Check%20&%20fix%20styling?label=code%20style)](https://github.com/jodeveloper/filament-rating/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/jodeveloper/filament-rating.svg?style=flat-square)](https://packagist.org/packages/jodeveloper/filament-rating)

A rating field for Filament forms with support for icons, colors, and inline alignment.

## Installation

You can install the package via composer:

```bash
composer require jodeveloper/filament-rating
```

Add the package blade files the content section of the _**tailwind.config.js**_ file.

```javascript
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./vendor/jodeveloper/**/*.blade.php", // Add this line
    ],
    theme: {
        extend: {},
    },
    plugins: [],
}
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-rating-views"
```

## Usage

### Basic Usage

```php
use Jodeveloper\FilamentRating\Forms\Components\Rating;

Rating::make('rating')
    ->label('Rate your experience')
    ->options([
        '1' => 'Poor',
        '2' => 'Fair', 
        '3' => 'Good',
        '4' => 'Very Good',
        '5' => 'Excellent'
    ])
    ->inline(true),
```

### With Icons

```php
Rating::make('rating')
    ->label('Rate your experience')
    ->options([
        '1' => 'Poor',
        '2' => 'Fair', 
        '3' => 'Good',
        '4' => 'Very Good',
        '5' => 'Excellent'
    ])
    ->icons([
        '1' => '<svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>',
        '2' => '<svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>',
        '3' => '<svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>',
        '4' => '<svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>',
        '5' => '<svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>',
    ])
    ->inline(true),
```

### With Colors

```php
Rating::make('rating')
    ->label('Rate your experience')
    ->options([
        '1' => 'Poor',
        '2' => 'Fair', 
        '3' => 'Good',
        '4' => 'Very Good',
        '5' => 'Excellent'
    ])
    ->color('yellow')
    ->inline(true),
```

### With Icons and Individual Colors

```php
Rating::make('rating')
    ->label('Rate your experience')
    ->options([
        '1' => 'Poor',
        '2' => 'Fair',
        '3' => 'Good',
        '4' => 'Very Good',
        '5' => 'Excellent'
    ])
    ->icons([
        '1' => 'heroicon-m-star',
        '2' => 'heroicon-m-star',
        '3' => 'heroicon-m-star',
        '4' => 'heroicon-m-star',
        '5' => 'heroicon-m-star',
    ])
    ->colors([
        '1' => 'red',
        '2' => 'orange',
        '3' => 'yellow',
        '4' => 'lime',
        '5' => 'green',
    ])
    ->showLabel(true)
    ->inline(true),
```

> **Note**: You can use any icon name from the [Blade Icons library](https://github.com/driesvints/blade-icons). The package will automatically render the icon with the appropriate color and styling.

### With Individual Colors and Default Color

```php
Rating::make('rating')
    ->label('Rate your experience')
    ->options([
        '1' => 'Poor',
        '2' => 'Fair',
        '3' => 'Good',
        '4' => 'Very Good',
        '5' => 'Excellent'
    ])
    ->icons([
        '1' => 'heroicon-m-star',
        '2' => 'heroicon-m-star',
        '3' => 'heroicon-m-star',
        '4' => 'heroicon-m-star',
        '5' => 'heroicon-m-star',
    ])
    ->colors([
        '1' => 'red',
        '5' => 'green',
    ])
    ->defaultColor('blue')
    ->showLabel(true)
    ->inline(true),
```

> **Note**: You can use any icon name from the [Blade Icons library](https://github.com/driesvints/blade-icons). The package will automatically render the icon with the appropriate color and styling.

### Hide Labels (Show Only Icons)

```php
Rating::make('rating')
    ->label('Rate your experience')
    ->options([
        '1' => 'Poor',
        '2' => 'Fair', 
        '3' => 'Good',
        '4' => 'Very Good',
        '5' => 'Excellent'
    ])
    ->icons([
        '1' => '<svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>',
        '2' => '<svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>',
        '3' => '<svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>',
        '4' => '<svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>',
        '5' => '<svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>',
    ])
    ->color('yellow')
    ->showLabel(false)
    ->inline(true),
```

## Methods

- `icons(array $icons)`: Set the icons for the rating options. The array key should match the option value.
- `colors(array $colors)`: Set individual colors for each rating option. The array key should match the option value.
- `defaultColor(string $color)`: Set the default color for rating options when no individual color is specified (e.g., 'yellow', 'blue', 'green', 'red').
- `color(string $color)`: Alias for `defaultColor()` method.
- `showLabel(bool $showLabel = true)`: Set whether to show the label alongside the icon.
- `inline(bool $inline = true)`: Set whether the options should be displayed inline.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/jodeveloper/filament-rating/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](https://github.com/jodeveloper/filament-rating/security/policy) on how to report security vulnerabilities.

## Credits

- [JoDeveloper](https://github.com/jodeveloper)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
