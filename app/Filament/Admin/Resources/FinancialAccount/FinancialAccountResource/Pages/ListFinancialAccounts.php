<?php

namespace App\Filament\Admin\Resources\FinancialAccount\FinancialAccountResource\Pages;

use App\Filament\Admin\Resources\FinancialAccount\FinancialAccountResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFinancialAccounts extends ListRecords
{
    protected static string $resource = FinancialAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
