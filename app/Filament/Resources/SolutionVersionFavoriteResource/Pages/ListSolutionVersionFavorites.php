<?php

namespace App\Filament\Resources\SolutionVersionFavoriteResource\Pages;

use App\Filament\Resources\SolutionVersionFavoriteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSolutionVersionFavorites extends ListRecords
{
    protected static string $resource = SolutionVersionFavoriteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
