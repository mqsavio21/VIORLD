<?php

namespace App\Filament\Widgets;

use App\Models\MatchHistory;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class WinLossDrawChartWidget extends ChartWidget
{
    protected ?string $heading = 'Win/Loss/Draw Ratio';

    protected function getData(): array
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $winCount = MatchHistory::where('result', 'Win')->count();
            $lossCount = MatchHistory::where('result', 'Lose')->count();
            $drawCount = MatchHistory::where('result', 'Draw')->count();
        } else {
            $winCount = MatchHistory::where('team_id', $user->team_id)->where('result', 'Win')->count();
            $lossCount = MatchHistory::where('team_id', $user->team_id)->where('result', 'Lose')->count();
            $drawCount = MatchHistory::where('team_id', $user->team_id)->where('result', 'Draw')->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Matches',
                    'data' => [$winCount, $lossCount, $drawCount],
                    'backgroundColor' => [
                        '#36A2EB',
                        '#FF6384',
                        '#FFCE56',
                    ],
                ],
            ],
            'labels' => ['Wins', 'Losses', 'Draws'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
