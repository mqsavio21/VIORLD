<?php

namespace App\Filament\Player\Widgets;

use Filament\Widgets\TableWidget;
use Filament\Tables\Table;

class RecentMatchHistoryWidget extends TableWidget
{
    protected static ?string $model = \App\Models\MatchHistory::class;

    public function table(Table $table): Table
    {
        return $table
            ->query(function (): \Illuminate\Database\Eloquent\Builder {
                return \App\Models\MatchHistory::query()
                    ->where('team_id', auth()->user()->team_id)
                    ->latest()
                    ->limit(5);
            })
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('opponent'),
                \Filament\Tables\Columns\BadgeColumn::make('result')
                    ->colors([
                        'success' => 'Win',
                        'danger' => 'Lose',
                        'secondary' => 'Draw',
                    ]),
                \Filament\Tables\Columns\TextColumn::make('score'),
            ]);
    }
}