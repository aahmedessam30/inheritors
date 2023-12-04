<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $floors = [
            [
                'real_estate_id' => 1,
                'name'           => 'ground',
                'rent'           => 600,
                'insurance'      => 1000,
                'description'    => 'ground floor',
            ],
            [
                'real_estate_id' => 1,
                'name'           => 'first',
                'rent'           => 600,
                'insurance'      => 1000,
                'description'    => 'first floor',
            ],
            [
                'real_estate_id' => 1,
                'name'           => 'second',
                'rent'           => 750,
                'insurance'      => 1000,
                'description'    => 'second floor',
            ],
        ];

        foreach ($floors as $floor) {
            \App\Models\Floor::create($floor);
        }
    }
}
