<?php

namespace App\Filament\Admin\Resources\Transaction\TransactionResource\Pages;

use App\Filament\Admin\Resources\Transaction\TransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransaction extends EditRecord
{
    protected static string $resource = TransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
