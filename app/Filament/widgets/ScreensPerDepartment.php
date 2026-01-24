<?php

namespace App\Filament\Widgets;

use App\Models\Department;
use Filament\Widgets\BarChartWidget;

class ScreensPerDepartment extends BarChartWidget
{
    protected static ?string $heading = 'Screens per Department';

    protected function getData(): array
    {
        $departments = Department::withCount('screens')->get();

        return [
            'datasets' => [
                [
                    'label' => 'Screens',
                    'data' => $departments->pluck('screens_count')->toArray(),
                ],
            ],
            'labels' => $departments->pluck('name')->toArray(),
        ];
    }
}
