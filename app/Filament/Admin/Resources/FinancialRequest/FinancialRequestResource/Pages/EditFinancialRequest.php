<?php

namespace App\Filament\Admin\Resources\FinancialRequest\FinancialRequestResource\Pages;

use App\Filament\Admin\Resources\FinancialRequest\FinancialRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFinancialRequest extends EditRecord
{
    protected static string $resource = FinancialRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
