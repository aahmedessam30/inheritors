<?php

namespace App\Filament\Admin\Resources\Renter\RenterResource\Pages;

use App\Filament\Admin\Resources\Renter\RenterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRenter extends EditRecord
{
    protected static string $resource = RenterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
