<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\House>
 */
class HouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $price = fake()->numberBetween(99990, fake()->randomNumber(9, true));
        return [
            'name' => fake()->name(),
            'price' => $price,
            'bedrooms' => fake()->randomDigitNotNull(),
            'bathrooms' => fake()->numberBetween(0, 3),
            'stores' => fake()->randomDigit(),
            'garages' => fake()->randomDigit()
        ];
    }
}
