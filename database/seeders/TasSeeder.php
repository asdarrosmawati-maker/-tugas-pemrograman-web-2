<?php

namespace Database\Seeders;

use App\Models\Tas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tas::factory()->count(300)->create();
    }
}
