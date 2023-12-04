<?php

namespace App\Filament\Admin\Resources\Contract\ContractResource\Pages;

use App\Filament\Admin\Resources\Contract\ContractResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContract extends EditRecord
{
    protected static string $resource = ContractResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
