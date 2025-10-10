<?php

namespace App\Filament\Resources\PlayerStats\Schemas;

use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class PlayerStatForm
{
    public static function configure(Schema $schema): Schema
    {
        $user = Auth::user();
        $players = $user->role === 'coach'
            ? User::where('role', 'player')->where('team_id', $user->team_id)->pluck('name', 'id')
            : User::where('role', 'player')->pluck('name', 'id');

        return $schema
            ->components([
                Select::make('player_id')
                    ->label('Player')
                    ->options($players)
                    ->searchable()
                    ->required(),
                TextInput::make('episode')
                    ->required(),
                TextInput::make('act')
                    ->required(),
                TextInput::make('month')
                    ->required()
                    ->maxLength(255),
                TextInput::make('peak_rating')
                    ->required(),
                TextInput::make('playtime')
                    ->label('Playtime (hours)')
                    ->required()
                    ->numeric(),
                TextInput::make('wins')
                    ->required()
                    ->numeric(),
                TextInput::make('win_percentage')
                    ->required()
                    ->numeric(),
                TextInput::make('kd_ratio')
                    ->required()
                    ->numeric(),
                TextInput::make('hs_percentage')
                    ->required()
                    ->numeric(),
                TextInput::make('top_agent')
                    ->required()
                    ->maxLength(255),
                DatePicker::make('recorded_at')
                    ->required(),
            ]);
    }
}
