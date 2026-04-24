<?php

namespace Database\Factories;

use App\Models\tas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<tas>
 */
class TasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'merek' => fake()->name(),
            'jenis' => fake()->name(),
            'harga' => fake()->numberBetween(),
            'stok' => fake()->numberBetween(),
        ];
    }
}
