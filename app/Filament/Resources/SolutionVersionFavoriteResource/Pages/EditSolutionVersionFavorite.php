<?php

namespace App\Filament\Resources\SolutionVersionFavoriteResource\Pages;

use App\Filament\Resources\SolutionVersionFavoriteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSolutionVersionFavorite extends EditRecord
{
    protected static string $resource = SolutionVersionFavoriteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
