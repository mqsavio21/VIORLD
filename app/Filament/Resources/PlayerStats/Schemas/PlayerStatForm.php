<?php

namespace App\Filament\Resources\PlayerStats\Schemas;

use Filament\Schemas\Schema;

class PlayerStatForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\Select::make('player_id')
                    ->relationship('player', 'name')
                    ->required(),
                \Filament\Forms\Components\TextInput::make('episode')
                    ->required(),
                \Filament\Forms\Components\TextInput::make('act')
                    ->required(),
                \Filament\Forms\Components\TextInput::make('month')
                    ->required(),
                \Filament\Forms\Components\TextInput::make('peak_rating')
                    ->required(),
                \Filament\Forms\Components\TextInput::make('playtime_hours')
                    ->numeric()
                    ->required(),
                \Filament\Forms\Components\TextInput::make('wins')
                    ->numeric()
                    ->required(),
                \Filament\Forms\Components\TextInput::make('win_rate')
                    ->numeric()
                    ->required(),
                \Filament\Forms\Components\TextInput::make('kd_ratio')
                    ->numeric()
                    ->required(),
                \Filament\Forms\Components\TextInput::make('hs_percent')
                    ->numeric()
                    ->required(),
                \Filament\Forms\Components\TextInput::make('top_agent')
                    ->required(),
                \Filament\Forms\Components\Select::make('updated_by')
                    ->relationship('user', 'name')
                    ->required(),
            ]);
    }
}
