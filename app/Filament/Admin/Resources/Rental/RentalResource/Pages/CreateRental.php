<?php

namespace App\Filament\Admin\Resources\Rental\RentalResource\Pages;

use App\Filament\Admin\Resources\Rental\RentalResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRental extends CreateRecord
{
    protected static string $resource = RentalResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if ($data['is_paid'] && !isset($data['paid_date'])) {
            $data['paid_date'] = now();
        }

        $data['status'] = $data['is_paid'] ? 'paid' : 'unpaid';
        return $data;
    }
}
