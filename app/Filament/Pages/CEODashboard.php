<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\StatsOverview;
use Filament\Pages\Dashboard as BaseDashboard;

class CEODashboard extends BaseDashboard
{

    protected static string $routePath = '/';

    public function getWidgets(): array
    {
        return [
            StatsOverview::class,
            \App\Filament\Widgets\TeamPerformanceChart::class,
        ];
    }
}