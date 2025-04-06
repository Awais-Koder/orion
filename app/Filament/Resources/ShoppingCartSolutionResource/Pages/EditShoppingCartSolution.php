<?php

namespace App\Filament\Resources\ShoppingCartSolutionResource\Pages;

use App\Filament\Resources\ShoppingCartSolutionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShoppingCartSolution extends EditRecord
{
    protected static string $resource = ShoppingCartSolutionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
