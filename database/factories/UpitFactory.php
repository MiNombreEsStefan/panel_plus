<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UpitFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'ime_klijenta' => fake()->word(),
            'email' => fake()->safeEmail(),
            'telefon' => fake()->word(),
            'opis' => fake()->text(),
            'status' => fake()->word(),
        ];
    }
}
