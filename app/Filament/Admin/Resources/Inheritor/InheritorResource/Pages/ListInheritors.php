<?php

namespace App\Filament\Admin\Resources\Inheritor\InheritorResource\Pages;

use App\Filament\Admin\Resources\Inheritor\InheritorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInheritors extends ListRecords
{
    protected static string $resource = InheritorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
