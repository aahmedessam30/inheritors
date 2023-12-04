<?php

namespace App\Filament\Admin\Resources\FinancialRequest\FinancialRequestResource\Pages;

use App\Filament\Admin\Resources\FinancialRequest\FinancialRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFinancialRequests extends ListRecords
{
    protected static string $resource = FinancialRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
