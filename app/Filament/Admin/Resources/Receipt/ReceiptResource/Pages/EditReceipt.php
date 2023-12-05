<?php

namespace App\Filament\Admin\Resources\Receipt\ReceiptResource\Pages;

use App\Filament\Admin\Resources\Receipt\ReceiptResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReceipt extends EditRecord
{
    protected static string $resource = ReceiptResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
