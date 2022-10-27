<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trade>
 */
class TradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cost' => fake()->randomFloat(2, 0, 9999),
            'interval' => fake()->numberBetween(1, 90),
            'date' => fake()->dateTime(),
            'type' => fake()->randomElement(['in', 'out', 'fixed']),
            'urssaf_percent' => fake()->randomFloat(2, 0, 100),
            'name' => fake()->word(),
            'user_id' => fake()->randomDigitNotNull(),
        ];
    }
}
