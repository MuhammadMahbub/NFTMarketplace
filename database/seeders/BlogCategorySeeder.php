<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlogCategory::create([
            'category_name' => "NFT",
        ]);
        BlogCategory::create([
            'category_name' => "Cryptocurrency",
        ]);
        BlogCategory::create([
            'category_name' => "Technology",
        ]);
    }
}
