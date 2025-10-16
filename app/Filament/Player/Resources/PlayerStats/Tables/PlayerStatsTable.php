<?php

namespace App\Filament\Player\Resources\PlayerStats\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PlayerStatsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('month')
                    ->searchable(),
                TextColumn::make('peak_rating')
                    ->sortable(),
                TextColumn::make('kd_ratio')
                    ->sortable(),
                TextColumn::make('win_percentage')
                    ->sortable(),
            ]);
    }
}
