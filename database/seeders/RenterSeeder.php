<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $renters = [
            [
                'floor_id'      => 1,
                'name'          => 'رجب',
                'phone_number'  => '01000000000',
                'national_id'   => '12345678901234',
                'address'       => 'المنصورة',
            ],
            [
                'floor_id'      => 2,
                'name'          => 'أبو حمادة',
                'phone_number'  => '01000000001',
                'national_id'   => '12345678901235',
                'address'       => 'المنصورة',
            ],
            [
                'floor_id'      => 3,
                'name'          => 'بنت أبو حمادة',
                'phone_number'  => '01000000002',
                'national_id'   => '12345678901236',
                'address'       => 'المنصورة',
            ],
        ];

        foreach ($renters as $renter) {
            \App\Models\Renter::create($renter);
        }
    }
}
