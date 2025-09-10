<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        $roles = ['Admin', 'Recepcioner', 'Menadžer', 'Gost'];

        foreach ($roles as $role) {
            Role::firstOrCreate(['naziv_role' => $role]);
        }
    }
}
