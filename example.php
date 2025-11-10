<?php

use Jodeveloper\FilamentRating\Forms\Components\Rating;

// Example 1: Basic Rating
Rating::make('rating')
    ->label('Rate your experience')
    ->options([
        '1' => 'Poor',
        '2' => 'Fair', 
        '3' => 'Good',
        '4' => 'Very Good',
        '5' => 'Excellent'
    ])
    ->inline(true);

// Example 2: Rating with Icons
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
    ->inline(true);

// Example 3: Rating with Color
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
    ->inline(true);

// Example 4: Rating with Icons and Individual Colors
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
    ->inline(true);

// Example 5: Rating with Icons Only and Individual Colors (No Labels)
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
    ->showLabel(false)
    ->inline(true);

// Example 6: Mixed - Some options with individual colors, others with default color
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
    ->inline(true);
