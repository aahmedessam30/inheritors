<?php

namespace App\Filament\Admin\Resources\Receipt\ReceiptResource\Pages;

use App\Filament\Admin\Resources\Receipt\ReceiptResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReceipts extends ListRecords
{
    protected static string $resource = ReceiptResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
