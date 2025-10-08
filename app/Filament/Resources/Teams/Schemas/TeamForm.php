<?php

namespace App\Filament\Resources\Teams\Schemas;

use Filament\Schemas\Schema;

class TeamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('name')
                    ->required(),
                \Filament\Forms\Components\Select::make('coach_id')
                    ->relationship('coach', 'name')
                    ->required(),
                \Filament\Forms\Components\Select::make('assistant_coach_id')
                    ->relationship('assistantCoach', 'name'),
                \Filament\Forms\Components\TextInput::make('max_players')
                    ->numeric()
                    ->required(),
                \Filament\Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }
}
