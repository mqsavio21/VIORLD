<?php

namespace App\Filament\Player\Widgets;

use App\Models\MatchHistory;
use App\Models\Schedule;
use App\Models\Task;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseStatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StatsOverviewWidget extends BaseStatsOverviewWidget
{
    protected function getStats(): array
    {
        $user = Auth::user();
        $winCount = MatchHistory::where('team_id', $user->team_id)->where('result', 'Win')->count();
        $lossCount = MatchHistory::where('team_id', $user->team_id)->where('result', 'Lose')->count();
        $drawCount = MatchHistory::where('team_id', $user->team_id)->where('result', 'Draw')->count();
        $taskCount = Task::where('assigned_to', $user->id)->count();

        return [
            Stat::make('W/L/D Ratio', $winCount . ' / ' . $lossCount . ' / ' . $drawCount),
            Stat::make('Total Tasks', $taskCount),
        ];
    }
}
