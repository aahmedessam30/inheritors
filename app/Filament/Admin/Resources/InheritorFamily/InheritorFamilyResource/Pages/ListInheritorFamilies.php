<?php

namespace App\Filament\Admin\Resources\InheritorFamily\InheritorFamilyResource\Pages;

use App\Filament\Admin\Resources\InheritorFamily\InheritorFamilyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInheritorFamilies extends ListRecords
{
    protected static string $resource = InheritorFamilyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
