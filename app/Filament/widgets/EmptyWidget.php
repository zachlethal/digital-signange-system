<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class EmptyWidget extends Widget
{
    protected static string $view = 'filament.widgets.empty-widget';

    protected function getViewData(): array
    {
        return [];
    }
}
