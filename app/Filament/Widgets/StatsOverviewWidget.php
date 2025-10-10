<?php

namespace App\Filament\Widgets;

use App\Models\MatchHistory;
use App\Models\Schedule;
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
        if ($user->role === 'admin') {
            $playerCount = User::where('role', 'player')->count();
            $scheduleCount = Schedule::whereDate('date_start', '>=', now()->format('Y-m-d'))->whereTime('time_start', '>=', now()->format('H:i:s'))->count();
            $winCount = MatchHistory::where('result', 'Win')->count();
            $lossCount = MatchHistory::where('result', 'Lose')->count();
        } else {
            $playerCount = User::where('role', 'player')->where('team_id', $user->team_id)->count();
            $scheduleCount = Schedule::where('team_id', $user->team_id)->whereDate('date_start', '>=', now()->format('Y-m-d'))->whereTime('time_start', '>=', now()->format('H:i:s'))->count();
            $winCount = MatchHistory::where('team_id', $user->team_id)->where('result', 'Win')->count();
            $lossCount = MatchHistory::where('team_id', $user->team_id)->where('result', 'Lose')->count();
        }

        return [
            Stat::make('Total Players', $playerCount),
            Stat::make('Upcoming Schedules', $scheduleCount),
            Stat::make('Win/Loss Ratio', $winCount . ' / ' . $lossCount),
        ];
    }
}
