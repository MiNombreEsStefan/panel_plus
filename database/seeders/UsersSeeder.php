<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@panelplus.test'],
            ['name' => 'Admin Stefan', 'password' => Hash::make('password'), 'uloga' => 'ADMIN']
        );

        User::updateOrCreate(
            ['email' => 'montazer@panelplus.test'],
            ['name' => 'Montažer Ilija', 'password' => Hash::make('password'), 'uloga' => 'MONTAZER']
        );
    }
}
