<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use Illuminate\Database\Seeder;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralSetting::create([
            'logo' => 'logo.png',
            'logo_dark' => 'logo_dark.png',
            'favicon' => 'favicon.ico',
            'app_title' => 'Xhibiter',
            'footer_description' => 'Create, sell and collect truly rare digital artworks. Powered by blockchain technology.',
            'site_designer' => 'DeoThemes',
            'designer_route' => 'https://deothemes.com',
        ]);
    }
}
