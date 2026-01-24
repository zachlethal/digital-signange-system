<?php

namespace App\Filament\Widgets;

use App\Models\ScreenControl;
use Filament\Widgets\Widget;

class ActiveMediaFiles extends Widget
{
    protected static string $view = 'filament.widgets.active-media-files';

    protected function getViewData(): array
    {
        return [
            'activeMediaCount' => ScreenControl::distinct('media_id')->count('media_id'),
        ];
    }
}
