<?php

namespace App\Filament\Resources\ScreenControlResource\Pages;

use App\Filament\Resources\ScreenControlResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListScreenControls extends ListRecords
{
    protected static string $resource = ScreenControlResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
