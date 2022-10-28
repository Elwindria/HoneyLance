<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;
use Illuminate\Container\Container;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

class SavingSeeder extends Seeder
{
    /* The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /* Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $period = CarbonPeriod::since('2020-10-01')->month()->until('2022-10-01');

        foreach ($period as $date) {
            DB::table('savings')->insert([
                'date' => $date->format('Y-m-d'),
                'count' => 200 * $this->faker->randomFloat(1, 0, 2),
                'user_id' => 1,
            ]);
        }
    }
}
