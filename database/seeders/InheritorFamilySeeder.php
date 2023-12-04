<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InheritorFamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $essamLabibId   = User::where('name', 'Essam Labib')->first()->id;
        $mohamedLabibId = User::where('name', 'Mohamed Labib')->first()->id;
        $alaaLabibId    = User::where('name', 'Alaa Labib')->first()->id;
        $nadiaLabibId   = User::where('name', 'Nadia Labib')->first()->id;
        $ebtsamLabibId  = User::where('name', 'Ebtsam Labib')->first()->id;
        $nabilaLabibId  = User::where('name', 'Nabila Labib')->first()->id;

        $users = [
            [
                'name'         => 'Ahmed Essam',
                'email'        => 'ahmedessam@inheritors.com',
                'password'     => Hash::make('01094286927'),
                'inheritor_id' => $essamLabibId,
                'roles'        => ['super_admin', 'inheritor_family']
            ],
            [
                'name'         => 'Alaa Essam',
                'email'        => 'alaaessam@inheritors.com',
                'password'     => Hash::make('alaaessam'),
                'inheritor_id' => $essamLabibId,
                'roles'        => ['admin', 'inheritor_family']
            ],
            [
                'name'         => 'Hoda Samir',
                'email'        => 'hodasamir@inheritors.com',
                'password'     => Hash::make('hodasamir'),
                'inheritor_id' => $essamLabibId,
                'roles'        => ['admin', 'inheritor_family']
            ],
            [
                'name'         => 'Nora Mohamed Labib',
                'email'        => 'noramohamed@inheritors.com',
                'password'     => Hash::make('noramohamed'),
                'inheritor_id' => $mohamedLabibId,
            ],
            [
                'name'         => 'Nermien Mohamed Labib',
                'email'        => 'nermienmohamed@inheritors.com',
                'password'     => Hash::make('nermienmohamed'),
                'inheritor_id' => $mohamedLabibId,
            ],
            [
                'name'         => 'Hadel Alaa Labib',
                'email'        => 'hadelalaa@inheritors.com',
                'password'     => Hash::make('hadelalaa'),
                'inheritor_id' => $alaaLabibId,
            ],
            [
                'name'         => 'Mohamed Alaa Labib',
                'email'        => 'mohamedalaa@inheritors.com',
                'password'     => Hash::make('mohamedalaa'),
                'inheritor_id' => $alaaLabibId,
            ],
            [
                'name'         => 'Amina Fekry',
                'email'        => 'aminafekry@inheritors.com',
                'password'     => Hash::make('aminafekry'),
                'inheritor_id' => $alaaLabibId,
            ],
            [
                'name'         => 'Ehab Ahmed Taha',
                'email'        => 'ehabtaha@inheritors.com',
                'password'     => Hash::make('ehabtaha'),
                'inheritor_id' => $nadiaLabibId,
            ],
            [
                'name'         => 'Eman Ahmed Taha',
                'email'        => 'emantaha@inheritors.com',
                'password'     => Hash::make('emantaha'),
                'inheritor_id' => $nadiaLabibId,
            ],
            [
                'name'         => 'Eman Mohamed Elmaghraby',
                'email'        => 'emanmohamed@inheritors.com',
                'password'     => Hash::make('emanmohamed'),
                'inheritor_id' => $ebtsamLabibId,
            ],
            [
                'name'         => 'Aya Mohamed Elmaghraby',
                'email'        => 'ayamohamed@inheritors.com',
                'password'     => Hash::make('ayamohamed'),
                'inheritor_id' => $ebtsamLabibId,
            ],
            [
                'name'         => 'Ahmed Mohamed Elmaghraby',
                'email'        => 'ahmedmohamed@inheritors.com',
                'password'     => Hash::make('ahmedmohamed'),
                'inheritor_id' => $ebtsamLabibId,
            ],
            [
                'name'         => 'Abdelrahman Mohamed Elmaghraby',
                'email'        => 'abdelrahmanmohamed@inheritors.com',
                'password'     => Hash::make('abdelrahmanmohamed'),
                'inheritor_id' => $ebtsamLabibId,
            ],
            [
                'name'         => 'Sara Ahmed Elhosary',
                'email'        => 'saraahmed@inheritors.com',
                'password'     => Hash::make('saraahmed'),
                'inheritor_id' => $nabilaLabibId,
            ],
            [
                'name'         => 'Salma Ahmed Elhosary',
                'email'        => 'salmaahmed@inheritors.com',
                'password'     => Hash::make('salmaahmed'),
                'inheritor_id' => $nabilaLabibId,
            ],
        ];

        foreach ($users as $user) {
            $roles = $user['roles'] ?? 'inheritor_family';
            unset($user['roles']);

            $createdUser = \App\Models\User::create([...$user, 'email_verified_at' => now()]);
            $createdUser->assignRole($roles);
        }
    }
}
