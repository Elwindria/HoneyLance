<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserSetting>
 */
class UserSettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'salary' => fake()->randomNumber(4, true),
            'date_start' => fake()->dateTime(),
            'urssaf_setting_id' => fake()->numberBetween(1, 4),
        ];
    }
}
