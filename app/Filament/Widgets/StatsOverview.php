<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getCards(): array
    {
        return [
            Stat::make('Total Tim', \App\Models\Team::count()),
            Stat::make('Total Coach', \App\Models\User::where('role', 'coach')->count()),
            Stat::make('Total Pemain', \App\Models\User::where('role', 'player')->count()),
        ];
    }
}
