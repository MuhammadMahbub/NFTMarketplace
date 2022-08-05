<?php

namespace Database\Seeders;

use App\Models\NftModule;
use Illuminate\Database\Seeder;

class NftModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NftModule::create([
            'icon'        => '<i class="fa-brands fa-amazon-pay"></i>',
            'title'       => 'Set up your wallet',
            'description' => "Once you've set up your wallet of choice, connect it to OpenSeaby clicking the NFT Marketplacein the top right corner",
        ]);
        NftModule::create([
            'icon'        => '<i class="fa-brands fa-angular"></i>',
            'title'       => 'Create Your Collection',
            'description' => "Click Create and set up your collection. Add social links, a description, profile & banner images, and set a secondary sales fee.",
        ]);
        NftModule::create([
            'icon'        => '<i class="fa-brands fa-salesforce"></i>',
            'title'       => 'Add Your NFTs',
            'description' => "Upload your work (image, video, audio, or 3D art), add a title and description, and customize your NFTs with properties, stats.",
        ]);
        NftModule::create([
            'icon'        => '<i class="fa-brands fa-amazon-pay"></i>',
            'title'       => 'List Them For Sale',
            'description' => "Choose between auctions, fixed-price listings, and declining-price listings. You choose how you want to sell your NFTs!",
        ]);
    }
}
