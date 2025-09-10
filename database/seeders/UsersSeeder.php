<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('naziv_role', 'Admin')->first();

        User::firstOrCreate(
            ['email' => 'admin@hotel.com'],
            [
                'ime' => 'Admin',
                'prezime' => 'User',
                'telefon' => '0601234567',
                'lozinka' => Hash::make('password'), // or bcrypt()
                'rola_id' => $adminRole->id,
            ]
        );
    }
}
