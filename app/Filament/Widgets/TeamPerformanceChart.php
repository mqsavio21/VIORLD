<?php

namespace App\Filament\Widgets;

use App\Models\Team;
use Filament\Widgets\ChartWidget;

class TeamPerformanceChart extends ChartWidget
{
    protected ?string $heading = 'Team Performance';

    protected function getData(): array
    {
        $teams = Team::withCount('players')->get();

        return [
            'datasets' => [
                [
                    'label' => 'Players',
                    'data' => $teams->pluck('players_count')->toArray(),
                ],
            ],
            'labels' => $teams->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}