<?php

namespace App\Filament\Resources\SolutionVersionResource\Pages;

use App\Filament\Resources\SolutionVersionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSolutionVersions extends ListRecords
{
    protected static string $resource = SolutionVersionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
