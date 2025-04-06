<?php

namespace App\Filament\Resources\MarkerTypeResource\Pages;

use App\Filament\Resources\MarkerTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMarkerTypes extends ListRecords
{
    protected static string $resource = MarkerTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
