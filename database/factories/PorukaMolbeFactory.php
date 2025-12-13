<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Zadatak;
use Illuminate\Database\Eloquent\Factories\Factory;

class PorukaMolbeFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'zadatak_id' => Zadatak::factory(),
            'user_id' => User::factory(),
            'tekst' => fake()->text(),
            'datum_vreme' => fake()->dateTime(),
        ];
    }
}
