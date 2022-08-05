<?php

namespace Database\Seeders;

use App\Models\NFTCategory;
use Illuminate\Database\Seeder;

class NFTCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NFTCategory::create([
            'icon' => '<i class="fa-brands fa-accusoft"></i>',
            'name' => 'Art',
            'unique_id' => 'Art.0x7a86c0b064171007716bbd6af96676935799a63e',
            'image' => 'collection_banner.jpg',
            'description' => 'Unique, fully 3D and built to unite the design multiverse. Designed and styled by Digimental.',
        ]);
        NFTCategory::create([
            'icon' => '<i class="fa-solid fa-align-left"></i>',
            'name' =>'Collectibles',
            'unique_id' => 'Collectibles.0x7a86c0b064171007716bbd6af96676935799a63e',
            'image' => 'collection_banner.jpg',
            'description' => 'Unique, fully 3D and built to unite the design multiverse. Designed and styled by Digimental.',
        ]);
        NFTCategory::create([
            'icon' => '<i class="fa-brands fa-autoprefixer"></i>',
            'name' => 'Domain',
            'unique_id' => 'Domain.0x7a86c0b064171007716bbd6af96676935799a63e',
            'image' => 'collection_banner.jpg',
            'description' => 'Unique, fully 3D and built to unite the design multiverse. Designed and styled by Digimental.',
        ]);
        NFTCategory::create([
            'icon' => '<i class="fa-solid fa-music"></i>',
            'name' => 'Music',
            'unique_id' => 'Music.0x7a86c0b064171007716bbd6af96676935799a63e',
            'image' => 'collection_banner.jpg',
            'description' => 'Unique, fully 3D and built to unite the design multiverse. Designed and styled by Digimental.',
        ]);
        NFTCategory::create([
            'icon' => '<i class="fa-solid fa-camera"></i>',
            'name' => 'Photography',
            'unique_id' => 'Photography.0x7a86c0b064171007716bbd6af96676935799a63e',
            'image' => 'collection_banner.jpg',
            'description' => 'Unique, fully 3D and built to unite the design multiverse. Designed and styled by Digimental.',
        ]);
        NFTCategory::create([
            'icon' => '<i class="fa-solid fa-globe"></i>',
            'name' => 'Virtual World',
            'unique_id' => 'Virtual.0x7a86c0b064171007716bbd6af96676935799a63e',
            'image' => 'collection_banner.jpg',
            'description' => 'Unique, fully 3D and built to unite the design multiverse. Designed and styled by Digimental.',
        ]);
    }
}
