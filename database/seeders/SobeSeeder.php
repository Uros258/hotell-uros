<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Soba;

class SobeSeeder extends Seeder
{
    public function run(): void
    {
        $sobe = [
            ['broj_sobe' => 101, 'tip_sobe' => 'jednokrevetna', 'cena' => 3500, 'status_sobe' => 'slobodna'],
            ['broj_sobe' => 102, 'tip_sobe' => 'dvokrevetna', 'cena' => 5000, 'status_sobe' => 'slobodna'],
            ['broj_sobe' => 201, 'tip_sobe' => 'apartman',     'cena' => 8000, 'status_sobe' => 'na održavanju'],
        ];

        foreach ($sobe as $soba) {
            Soba::firstOrCreate(['broj_sobe' => $soba['broj_sobe']], $soba);
        }
    }
}
