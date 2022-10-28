<?php

namespace Database\Seeders;

use App\Models\UserSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_settings')->insert([
            'salary' => 1500,
            'date_start' => '2022-10-01',
            'urssaf_setting_id' => 1,
        ]);
    }
}
