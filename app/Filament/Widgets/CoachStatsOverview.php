<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CoachStatsOverview extends StatsOverviewWidget
{
    protected function getCards(): array
    {
        return [
            Stat::make('Total Pemain', \App\Models\User::where('role', 'player')->where('team_id', auth()->user()->team_id)->count()),
            Stat::make('Materi Latihan', \App\Models\Material::where('team_id', auth()->user()->team_id)->count()),
            Stat::make('PR Pending', \App\Models\Note::where('coach_id', auth()->id())->where('status', 'pending')->count()),
        ];
    }
}