<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class CoachDashboard extends BaseDashboard
{

    protected static string $routePath = '/';

    public function getWidgets(): array
    {
        return [
            \App\Filament\Widgets\CoachStatsOverview::class,
            \App\Filament\Widgets\TeamPlayers::class,
        ];
    }
}