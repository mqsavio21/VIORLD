<?php

namespace App\Filament\Resources\Schedules\Schemas;

use App\Models\Team;
use App\Models\User;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ScheduleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Select::make('team_id')
                    ->label('Team')
                    ->options(Team::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Select::make('coach_id')
                    ->label('Coach')
                    ->options(User::where('role', 'coach')->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                DateTimePicker::make('date_start')
                    ->required(),
                DateTimePicker::make('date_end')
                    ->required(),
                Textarea::make('description')
                    ->required(),
            ]);
    }
}
