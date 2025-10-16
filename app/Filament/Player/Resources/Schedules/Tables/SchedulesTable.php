<?php

namespace App\Filament\Player\Resources\Schedules\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SchedulesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('coach.name')
                    ->searchable(),
                TextColumn::make('date_start')
                    ->date()
                    ->sortable(),
                TextColumn::make('time_start')
                    ->sortable(),
            ]);
    }
}
