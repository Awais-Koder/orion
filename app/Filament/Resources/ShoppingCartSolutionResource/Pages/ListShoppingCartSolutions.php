<?php

namespace App\Filament\Resources\ShoppingCartSolutionResource\Pages;

use App\Filament\Resources\ShoppingCartSolutionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShoppingCartSolutions extends ListRecords
{
    protected static string $resource = ShoppingCartSolutionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
