<?php

namespace App\Filament\Player\Widgets;

use App\Models\MatchHistory;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class RecentMatchHistoryWidget extends TableWidget
{
    protected static ?string $model = MatchHistory::class;

    public function table(Table $table): Table
    {
        return $table
            ->query(function (): Builder {
                $query = MatchHistory::query()
                    ->latest()
                    ->limit(5);

                return $query->where('team_id', Auth::user()->team_id);
            })
            ->columns([
                TextColumn::make('opponent'),
                BadgeColumn::make('result')
                    ->colors([
                        'success' => 'Win',
                        'danger' => 'Lose',
                        'secondary' => 'Draw',
                    ]),
                TextColumn::make('score'),
            ]);
    }
}
