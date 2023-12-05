<?php

namespace App\Filament\Admin\Resources\FinancialAccount\FinancialAccountResource\Pages;

use App\Filament\Admin\Resources\FinancialAccount\FinancialAccountResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFinancialAccount extends CreateRecord
{
    protected static string $resource = FinancialAccountResource::class;
}
