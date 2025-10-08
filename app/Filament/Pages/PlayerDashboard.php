<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class PlayerDashboard extends BaseDashboard
{

    protected static string $routePath = '/';

    public function getWidgets(): array
    {
        return [
            \App\Filament\Widgets\PlayerStatsOverview::class,
            \App\Filament\Widgets\PlayerTeam::class,
        ];
    }
}