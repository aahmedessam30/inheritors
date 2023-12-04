<?php

namespace App\Filament\Admin\Resources\RealEstate\RealEstateResource\Pages;

use App\Filament\Admin\Resources\RealEstate\RealEstateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRealEstate extends EditRecord
{
    protected static string $resource = RealEstateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
