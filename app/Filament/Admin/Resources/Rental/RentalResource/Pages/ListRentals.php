<?php

namespace App\Filament\Admin\Resources\Rental\RentalResource\Pages;

use App\Filament\Admin\Resources\Rental\RentalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRentals extends ListRecords
{
    protected static string $resource = RentalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
