<?php

namespace App\Filament\Resources\RegionApplicationResource\Pages;

use App\Filament\Resources\RegionApplicationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRegionApplications extends ListRecords
{
    protected static string $resource = RegionApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
