<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class TeamPlayers extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                User::query()->where('team_id', auth()->user()->team_id)
            )
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
            ]);
    }
}