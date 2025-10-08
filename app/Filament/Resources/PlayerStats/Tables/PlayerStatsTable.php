<?php

namespace App\Filament\Resources\PlayerStats\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class PlayerStatsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('player.name')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('episode'),
                \Filament\Tables\Columns\TextColumn::make('act'),
                \Filament\Tables\Columns\TextColumn::make('month'),
                \Filament\Tables\Columns\TextColumn::make('peak_rating'),
                \Filament\Tables\Columns\TextColumn::make('win_rate'),
                \Filament\Tables\Columns\TextColumn::make('kd_ratio'),
                \Filament\Tables\Columns\TextColumn::make('hs_percent'),
                \Filament\Tables\Columns\TextColumn::make('top_agent'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
