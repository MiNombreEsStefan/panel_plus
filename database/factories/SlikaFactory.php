<?php

namespace Database\Factories;

use App\Models\Zadatak;
use Illuminate\Database\Eloquent\Factories\Factory;

class SlikaFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'zadatak_id' => Zadatak::factory(),
            'putanja' => fake()->word(),
            'opis' => fake()->word(),
        ];
    }
}
