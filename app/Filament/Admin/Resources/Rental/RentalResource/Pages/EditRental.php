<?php

namespace App\Filament\Admin\Resources\Rental\RentalResource\Pages;

use App\Filament\Admin\Resources\Rental\RentalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRental extends EditRecord
{
    protected static string $resource = RentalResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if ($data['is_paid'] && !isset($data['paid_date'])) {
            $data['paid_date'] = now();
        }

        $data['status'] = $data['is_paid'] ? 'paid' : 'unpaid';
        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
