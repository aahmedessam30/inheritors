<?php

namespace App\Filament\Admin\Resources\Renter\RenterResource\Pages;

use App\Filament\Admin\Resources\Renter\RenterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRenters extends ListRecords
{
    protected static string $resource = RenterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
