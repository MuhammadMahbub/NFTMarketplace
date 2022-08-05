<?php

namespace Database\Seeders;

use App\Models\AboutHeader;
use Illuminate\Database\Seeder;

class AboutHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutHeader::create([
            'title'      => 'About Xhibiter',
            'meta_title' => 'Every digital creation available through MakersPlace is an authentic and truly unique digital creation, signed and issued by the creator — made possible by blockchain technology.',
            'video_url'  => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        ]);
    }
}
