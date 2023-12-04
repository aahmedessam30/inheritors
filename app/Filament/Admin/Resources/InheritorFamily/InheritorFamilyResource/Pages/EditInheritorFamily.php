<?php

namespace App\Filament\Admin\Resources\InheritorFamily\InheritorFamilyResource\Pages;

use App\Filament\Admin\Resources\InheritorFamily\InheritorFamilyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInheritorFamily extends EditRecord
{
    protected static string $resource = InheritorFamilyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
