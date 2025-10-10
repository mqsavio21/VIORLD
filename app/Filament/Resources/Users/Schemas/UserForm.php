<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\Team;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class UserForm
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
                    ->options(function () {
                        $roles = [
                            'player' => 'Player',
                            'coach' => 'Coach',
                        ];

                        if (Auth::user()->role === 'admin') {
                            $roles['admin'] = 'Admin';
                        }

                        return $roles;
                    })
                    ->required(),
            ]);
    }
}
