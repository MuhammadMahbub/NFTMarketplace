<?php

namespace Database\Seeders;

use App\Models\PartnerService;
use Illuminate\Database\Seeder;

class PartnerServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PartnerService::create([
            'icon'        => '<i class="fa-solid fa-sack-dollar"></i>',
            'title'       => 'Generate Revanue',
            'description' => "With millions in transactions since 2017, we'll help you generate revenue on our platform ⁠— from direct sales to secondary sales",
        ]);
        PartnerService::create([
            'icon'        => '<i class="fa-solid fa-people-group"></i>',
            'title'       => 'Reach Millions',
            'description' => "With over thousands of users and followers, we can help you reach a large audience of collectors",
        ]);
        PartnerService::create([
            'icon'        => '<i class="fa-solid fa-wallet"></i>',
            'title'       => 'Spend Less',
            'description' => "Compared with other NFT marketplaces, we have lowest fees in the space allowing you to spend less with your created collection",
        ]);
        PartnerService::create([
            'icon'        => '<i class="fa-solid fa-store"></i>',
            'title'       => 'Gas-free Marketplace',
            'description' => "With our multiple blockchains support, create, buy, and sell NFTs without paying any gas fee",
        ]);
        PartnerService::create([
            'icon'        => '<i class="fa-solid fa-fire"></i>',
            'title'       => 'Advertise Xhibiter',
            'description' => "With the most powerful way for users to buy and sell NFTS, we offer the most advanced features",
        ]);
        PartnerService::create([
            'icon'        => '<i class="fa-solid fa-hand-holding-hand"></i>',
            'title'       => 'Earn 20% Commission Per Sale!',
            'description' => "With over thousands of collections, we are proud to host the widest range of categories, ranging from digital to physical NFTs",
        ]);
    }
}
