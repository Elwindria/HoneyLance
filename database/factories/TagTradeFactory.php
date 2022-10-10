<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TagTrade>
 */
class TagTradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tag_id' => fake()->numberBetween(1, 30),
            'trade_id' => fake()->numberBetween(1, 30),
        ];
    }
}
