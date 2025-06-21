<?php

namespace App\Filament\Widgets;

use App\Models\Department;
use Filament\Widgets\Widget;

class DepartmentsCount extends Widget
{
    protected static string $view = 'filament.widgets.departments-count';

    protected function getViewData(): array
    {
        return [
            'totalDepartments' => Department::count(),
        ];
    }
}
