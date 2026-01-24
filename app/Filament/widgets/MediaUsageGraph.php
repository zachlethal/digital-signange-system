<?php

namespace App\Filament\Widgets;

use App\Models\ScreenControl;
use Filament\Widgets\ChartWidget;

class MediaUsageGraph extends ChartWidget
{
    protected static ?string $heading = 'Screens by Media';

    protected function getData(): array
    {
        $mediaUsage = ScreenControl::select('media_id', \DB::raw('count(*) as screen_count'))
            ->groupBy('media_id')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Screens Displaying Media',
                    'data' => $mediaUsage->pluck('screen_count')->toArray(),
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $mediaUsage->pluck('media_id')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
