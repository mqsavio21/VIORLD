<?php

namespace App\Filament\Player\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use App\Models\PlayerStat;
use Illuminate\Support\Facades\Auth;

class ThisMonthPlayerStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $playerStat = PlayerStat::where('player_id', Auth::id())->latest()->first();

        if (!$playerStat) {
            return [];
        }

        return [
            Stat::make('Peak Rating', $playerStat->peak_rating),
            Stat::make('Playtime (hours)', $playerStat->playtime),
            Stat::make('Wins', $playerStat->wins),
            Stat::make('Win %', $playerStat->win_percentage . '%'),
            Stat::make('K/D Ratio', $playerStat->kd_ratio),
            Stat::make('Headshot %', $playerStat->hs_percentage . '%'),
            Stat::make('Top Agent', $playerStat->top_agent),
        ];
    }
}
