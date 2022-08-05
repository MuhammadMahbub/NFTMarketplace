<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::create([
            'title'     => 'Buy, sell and collect NFTs.',
            'sub_title' => 'The worlds largest digital marketplace for crypto collectibles and non-fungible tokens',
            'btn1_text' => "Upload",
            'btn1_url'  => "create",
            'btn2_text' => "Explore",
            'btn2_url'  => "explore_collections",
            'image'     => 'default.jpg'
        ]);
    }
}
