<?php

namespace App\Filament\Resources\ScreenResource\Pages;

use App\Filament\Resources\ScreenResource;
use Filament\Resources\Pages\CreateRecord;

class CreateScreen extends CreateRecord
{
    protected static string $resource = ScreenResource::class;

    // Optionally, you can override the method for handling creation if needed
    protected function afterSave(): void
    {
        parent::afterSave();
    }
}
