<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trade;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\DB;

class TradeSeeder extends Seeder
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
        for ($i=0; $i < 10000 ; $i++) { 
            
            $trade = new Trade;
            $trade->cost = $this->faker->randomFloat(2, 0, 4500);
            $trade->interval = $this->faker->numberBetween(1, 90);
            $trade->date = $this->faker->dateTimeBetween('2020-10-01');
            $trade->type = $this->faker->randomElement(['in', 'out']);
            $trade->urssaf_percent = 22.2;
            $trade->name = $this->faker->word();
            $trade->user_id = 1;
            $trade->save();

            $trade->tags()->attach($this->faker->randomElements([1, 2, 3, 4, 5], 3));
        }
    }
}
