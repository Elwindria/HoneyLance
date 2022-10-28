<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'name_tag' => 'tag 1',
            'user_id' => 1,
        ]);

        DB::table('tags')->insert([
            'name_tag' => 'tag 2',
            'user_id' => 1,
        ]);

        DB::table('tags')->insert([
            'name_tag' => 'tag 3',
            'user_id' => 1,
        ]);

        DB::table('tags')->insert([
            'name_tag' => 'tag 4',
            'user_id' => 1,
        ]);

        DB::table('tags')->insert([
            'name_tag' => 'tag 5',
            'user_id' => 1,
        ]);
    }
}
