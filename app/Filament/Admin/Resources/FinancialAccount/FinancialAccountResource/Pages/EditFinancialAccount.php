<?php

namespace App\Filament\Admin\Resources\FinancialAccount\FinancialAccountResource\Pages;

use App\Filament\Admin\Resources\FinancialAccount\FinancialAccountResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFinancialAccount extends EditRecord
{
    protected static string $resource = FinancialAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
