<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InheritorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inheritors = [
            [
                'name'     => 'Essam Labib',
                'email'    => 'essamlabib@inheritors.com',
                'password' => Hash::make('essamlabib'),
            ],
            [
                'name'     => 'Mohamed Labib',
                'email'    => 'mohamedlabib@inheritors.com',
                'password' => Hash::make('mohamedlabib'),
            ],
            [
                'name'     => 'Alaa Labib',
                'email'    => 'alaalabib@inheritors.com',
                'password' => Hash::make('alaalabib'),
            ],
            [
                'name'     => 'Nadia Labib',
                'email'    => 'nadialabib@inheritors.com',
                'password' => Hash::make('nadialabib'),
            ],
            [
                'name'     => 'Ebtsam Labib',
                'email'    => 'ebtsamlabib@inheritors.com',
                'password' => Hash::make('ebtsamlabib'),
            ],
            [
                'name'     => 'Nabila Labib',
                'email'    => 'nabilalabib@inheritors.com',
                'password' => Hash::make('nabilalabib'),
            ]
        ];

        foreach ($inheritors as $inheritor) {
            $user = \App\Models\User::create([...$inheritor, 'email_verified_at' => now()]);
            $user->assignRole('inheritor');
        }
    }
}
