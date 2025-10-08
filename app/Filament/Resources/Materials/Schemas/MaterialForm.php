<?php

namespace App\Filament\Resources\Materials\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class MaterialForm
{
    public static function schema(): array
    {
        return [
            TextInput::make('title')
                ->required()
                ->maxLength(255),
            Textarea::make('description')
                ->required()
                ->maxLength(65535),
            TextInput::make('link')
                ->required()
                ->url()
                ->maxLength(255),
            Select::make('created_by')
                ->relationship('creator', 'name')
                ->default(auth()->id())
                ->required(),
        ];
    }
}
