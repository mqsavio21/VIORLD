<?php

namespace App\Filament\Resources\MatchHistories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MatchHistoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('team.name')
                    ->searchable(),
                TextColumn::make('opponent')
                    ->searchable(),
                TextColumn::make('map')
                    ->searchable(),
                BadgeColumn::make('result')
                    ->colors([
                        'success' => 'Win',
                        'danger' => 'Lose',
                        'secondary' => 'Draw',
                    ]),
                TextColumn::make('score'),
                TextColumn::make('match_date')
                    ->date()
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
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
