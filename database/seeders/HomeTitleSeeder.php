<?php

namespace Database\Seeders;

use App\Models\HomeTitle;
use Illuminate\Database\Seeder;

class HomeTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HomeTitle::create([
            'collection_title' => "Top Collections over",
            'category_title'   => "Trending Categories",
            'module_title'     => "Create and Sell your NFTs",
        ]);
    }
}
