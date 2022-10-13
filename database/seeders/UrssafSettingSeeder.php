<?php

namespace Database\Seeders;

use App\Models\UrssafSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UrssafSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UrssafSetting::factory()
                ->count(4)
                ->create();
    }
}
