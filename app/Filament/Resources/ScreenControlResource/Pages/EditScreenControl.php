<?php

namespace App\Filament\Resources\ScreenControlResource\Pages;

use App\Filament\Resources\ScreenControlResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditScreenControl extends EditRecord
{
    protected static string $resource = ScreenControlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
