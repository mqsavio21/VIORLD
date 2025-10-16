<?php

namespace App\Filament\Player\Resources\Materials\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MaterialsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('category')
                    ->searchable(),
                TextColumn::make('creator.name')
                    ->searchable(),
            ]);
    }
}
