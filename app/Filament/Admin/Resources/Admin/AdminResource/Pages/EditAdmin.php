<?php

namespace App\Filament\Admin\Resources\Admin\AdminResource\Pages;

use App\Filament\Admin\Resources\Admin\AdminResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdmin extends EditRecord
{
    protected static string $resource = AdminResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
