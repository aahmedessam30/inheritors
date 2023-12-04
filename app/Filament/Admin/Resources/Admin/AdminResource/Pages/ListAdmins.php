<?php

namespace App\Filament\Admin\Resources\Admin\AdminResource\Pages;

use App\Filament\Admin\Resources\Admin\AdminResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdmins extends ListRecords
{
    protected static string $resource = AdminResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
