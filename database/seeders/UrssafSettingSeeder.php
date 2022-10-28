<?php

namespace Database\Seeders;

use App\Models\UrssafSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UrssafSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('urssaf_settings')->insert([
            'percentage' => 12.9,
            'description' => 'Vente de marchandises (BIC)',
        ]);

        DB::table('urssaf_settings')->insert([
            'percentage' => 22.3,
            'description' => 'Prestation de services BIC (artisanale)',
        ]);

        DB::table('urssaf_settings')->insert([
            'percentage' => 22.2,
            'description' => 'Prestation de services BNC (commerciale)',
        ]);

        DB::table('urssaf_settings')->insert([
            'percentage' => 22.2,
            'description' => 'Libérale classique',
        ]);

        DB::table('urssaf_settings')->insert([
            'percentage' => 22.4,
            'description' => 'Libérale réglementée à la CIPAV',
        ]);
    }
}
