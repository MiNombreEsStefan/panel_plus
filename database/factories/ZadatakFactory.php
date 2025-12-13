<?php

namespace Database\Factories;

use App\Models\Upit;
use Illuminate\Database\Eloquent\Factories\Factory;

class ZadatakFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'naslov' => fake()->word(),
            'opis' => fake()->text(),
            'lokacija' => fake()->word(),
            'datum_kreiranja' => fake()->dateTime(),
            'status' => fake()->word(),
            'upit_id' => Upit::factory(),
        ];
    }
}
