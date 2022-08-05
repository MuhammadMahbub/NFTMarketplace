<?php

namespace Database\Seeders;

use App\Models\PartnerTopSection;
use Illuminate\Database\Seeder;

class PartnerTopSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PartnerTopSection::create([
            'icon1' => '<i class="fa-solid fa-code"></i>',
            'text1' => ' NFTs created',
            'icon2' => '<i class="fa-solid fa-star-shooting"></i>',
            'text2' => 'Rated the best NFT Marketplace',
            'icon3' => '<i class="fa-solid fa-face-smile"></i>',
            'text3' => '+ Happy NFT Users',
        ]);
    }
}
