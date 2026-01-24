<?php

namespace App\Filament\Widgets;

use App\Models\Screen;
use Filament\Widgets\Widget;

class TotalScreens extends Widget
{
    protected static string $view = 'filament.widgets.total-screens';

    protected function getViewData(): array
    {
        return [
            'totalScreens' => Screen::count(),
        ];
    }
    
}
