<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RealEstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $realEstates = [
            [
                'name'          => 'بيت الحاج لبيب عبد الجليل',
                'address'       => 'المنصورة',
                'city'          => 'المنصورة',
                'state'         => 'الدقهلية',
                'zip'           => '12345',
                'lat'           => '31.037933',
                'lng'           => '31.381523',
                'price'         => '1000000',
                'floors'        => 3,
                'description'   => 'بيت الحاج لبيب عبد الجليل',
                'status'        => 'for_sale'
            ],
        ];

        foreach ($realEstates as $realEstate) {
            \App\Models\RealEstate::create($realEstate);
        }
    }
}
