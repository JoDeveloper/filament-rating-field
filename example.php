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
        '1' => '#ef4444',
        '2' => '#f97316',
        '3' => '#eab308',
        '4' => '#84cc16',
        '5' => '#22c55e',
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
        '1' => '#ef4444',
        '2' => '#f97316',
        '3' => '#eab308',
        '4' => '#84cc16',
        '5' => '#22c55e',
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
        '1' => '#ef4444',
        '5' => '#22c55e',
    ])
    ->defaultColor('blue')
    ->showLabel(true)
    ->inline(true);
