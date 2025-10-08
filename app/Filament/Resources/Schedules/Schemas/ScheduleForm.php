<?php

namespace App\Filament\Resources\Schedules\Schemas;

use Filament\Schemas\Schema;

class ScheduleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('title')
                    ->required(),
                \Filament\Forms\Components\DatePicker::make('date')
                    ->required(),
                \Filament\Forms\Components\TimePicker::make('start_time')
                    ->required(),
                \Filament\Forms\Components\TimePicker::make('end_time')
                    ->required(),
                \Filament\Forms\Components\Select::make('team_id')
                    ->relationship('team', 'name')
                    ->required(),
                \Filament\Forms\Components\Select::make('created_by')
                    ->relationship('user', 'name')
                    ->required(),
            ]);
    }
}
