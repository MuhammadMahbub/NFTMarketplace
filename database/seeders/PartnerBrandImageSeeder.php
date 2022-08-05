<?php

namespace Database\Seeders;

use App\Models\PartnerBrandImage;
use Illuminate\Database\Seeder;

class PartnerBrandImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PartnerBrandImage::create(['image' => 'image1.png']);
        PartnerBrandImage::create(['image' => 'image2.png']);
        PartnerBrandImage::create(['image' => 'image3.png']);
        PartnerBrandImage::create(['image' => 'image4.png']);
        PartnerBrandImage::create(['image' => 'image5.png']);
    }
}
