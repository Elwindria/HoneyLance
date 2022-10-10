<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '1234@abcd',
            'grade' => 'user',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'user_setting_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::newFactory()
                ->count(9)
                ->create();
    }
}