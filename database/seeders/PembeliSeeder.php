<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pembeli;

class PembeliSeeder extends Seeder
{
    public function run(): void
    {
        Pembeli::factory()->count(500)->create();
    }
}
