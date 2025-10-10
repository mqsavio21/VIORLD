<?php

namespace App\Filament\Resources\Players\Schemas;

use App\Models\Team;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PlayerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('username')
                    ->required()
                    ->maxLength(255),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255),
                Select::make('team_id')
                    ->label('Team')
                    ->options(Team::all()->pluck('name', 'id'))
                    ->searchable(),
                Select::make('role')
                    ->options([
                        'player' => 'Player',
                        'coach' => 'Coach',
                        'admin' => 'Admin',
                    ])
                    ->required(),
            ]);
    }
}
