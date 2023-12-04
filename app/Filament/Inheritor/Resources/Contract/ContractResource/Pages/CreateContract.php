<?php

namespace App\Filament\Inheritor\Resources\Contract\ContractResource\Pages;

use App\Filament\Inheritor\Resources\Contract\ContractResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateContract extends CreateRecord
{
    protected static string $resource = ContractResource::class;
}
