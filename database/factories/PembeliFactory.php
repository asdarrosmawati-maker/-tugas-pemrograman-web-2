<?php

namespace Database\Factories;

use App\Models\Pembeli;
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PembeliFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'no_hp' => $this->faker->phoneNumber(),
        ];
    }
}
