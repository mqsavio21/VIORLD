<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class PlayerTeam extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                User::query()->where('id', auth()->user()->team->coach_id)
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Coach'),
                Tables\Columns\TextColumn::make('team.name')->label('Tim'),
            ]);
    }
}