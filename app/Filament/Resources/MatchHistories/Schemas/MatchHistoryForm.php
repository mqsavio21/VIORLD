<?php

namespace App\Filament\Resources\MatchHistories\Schemas;

use App\Models\Team;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class MatchHistoryForm
{
    public static function configure(Schema $schema): Schema
    {
        $user = Auth::user();
        $teams = $user->role === 'coach'
            ? Team::where('coach_id', $user->id)->pluck('name', 'id')
            : Team::all()->pluck('name', 'id');

        return $schema
            ->components([
                Select::make('team_id')
                    ->label('Team')
                    ->options($teams)
                    ->searchable()
                    ->required(),
                TextInput::make('opponent')
                    ->required()
                    ->maxLength(255),
                Select::make('map')
                    ->options([
                        'Ascent' => 'Ascent',
                        'Bind' => 'Bind',
                        'Haven' => 'Haven',
                        'Icebox' => 'Icebox',
                        'Split' => 'Split',
                        'Breeze' => 'Breeze',
                        'Fracture' => 'Fracture',
                        'Pearl' => 'Pearl',
                        'Lotus' => 'Lotus',
                        'Sunset' => 'Sunset',
                    ])
                    ->required(),
                Select::make('mode')
                    ->options([
                        'Competitive' => 'Competitive',
                        'Scrim' => 'Scrim',
                        'Custom' => 'Custom',
                    ])
                    ->required(),
                DatePicker::make('match_date')
                    ->required(),
                TextInput::make('score')
                    ->required()
                    ->maxLength(255),
                Select::make('result')
                    ->options([
                        'Win' => 'Win',
                        'Lose' => 'Lose',
                        'Draw' => 'Draw',
                    ])
                    ->required(),
                TextInput::make('link')
                    ->url()
                    ->maxLength(255),
                Textarea::make('notes')
                    ->maxLength(65535),
            ]);
    }
}
