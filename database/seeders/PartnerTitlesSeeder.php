<?php

namespace Database\Seeders;

use App\Models\PartnerTitles;
use Illuminate\Database\Seeder;

class PartnerTitlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PartnerTitles::create([
            'title1'       => 'Xhibiter Affiliate Partnership',
            'description1' => 'Interested in making money with Xhibiter? Earn A 20% Commission For Every Sale You Refer By Recommending The Most Powerful NFT marketplace. 305,000+ NFTs created Rated the best NFT Marketplace',
            'title2'       => 'How Our Affiliate Program Works',
            'description2' => "While we take pride in being the first and largest marketplace and in our robust feature set, we also help our partners succeed with the following...",
            'title3'       => 'Who has partnered with us',
            'description3' => 'While we take pride in being the first and largest marketplace and in our robust feature set, we also help our partners succeed with the following...'
        ]);
    }
}
