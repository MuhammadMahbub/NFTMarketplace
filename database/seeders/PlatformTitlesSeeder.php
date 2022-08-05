<?php

namespace Database\Seeders;

use App\Models\PlatformTitles;
use Illuminate\Database\Seeder;

class PlatformTitlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlatformTitles::create([
            'title' => 'Xhibiter System Status',
            'image' => 'banner.jpg',
            'operation_title' => 'All Systems Operational',
            'history_title' => 'Past Incidents'
        ]);
    }
}
