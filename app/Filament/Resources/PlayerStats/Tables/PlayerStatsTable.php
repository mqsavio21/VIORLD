<?php

namespace App\Filament\Resources\PlayerStats\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PlayerStatsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('player.name')
                    ->searchable(),
                TextColumn::make('month')
                    ->searchable(),
                TextColumn::make('peak_rating')
                    ->sortable(),
                TextColumn::make('kd_ratio')
                    ->sortable(),
                TextColumn::make('win_percentage')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([]);
    }
}
