<?php

namespace App\Filament\Admin\Resources\FinancialRequest\FinancialRequestResource\Pages;

use App\Filament\Admin\Resources\FinancialRequest\FinancialRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFinancialRequest extends CreateRecord
{
    protected static string $resource = FinancialRequestResource::class;
}
