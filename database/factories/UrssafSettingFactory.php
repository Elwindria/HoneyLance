<?php

namespace Database\Factories;
use App\Models\UrssafSetting;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UrssafSetting>
 */
class UrssafSettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

        /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UrssafSetting::class;

    public function definition()
    {
        return [
            //Créer fake data avec pour les % un float (nbr décimal, min 0, max 100)
            'percentage' => fake()->randomFloat(2, 0, 100),
            'description' => fake()->sentence(),
        ];
    }
}
