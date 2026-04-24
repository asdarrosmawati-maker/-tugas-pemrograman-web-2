<?php

namespace Database\Seeders;

use App\Models\tas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tas::factory()->count(200)->create();
    }
}
