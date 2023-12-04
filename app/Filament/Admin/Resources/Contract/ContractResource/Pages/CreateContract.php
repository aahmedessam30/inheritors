<?php

namespace App\Filament\Admin\Resources\Contract\ContractResource\Pages;

use App\Filament\Admin\Resources\Contract\ContractResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateContract extends CreateRecord
{
    protected static string $resource = ContractResource::class;
}
