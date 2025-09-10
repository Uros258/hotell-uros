<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusesSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = ['Kreirana', 'Potvrđena', 'Prijavljen', 'Odjavljen', 'Otkazana'];

        foreach ($statuses as $status) {
            Status::firstOrCreate(['naziv_statusa' => $status]);
        }
    }
}
