<?php

namespace Database\Seeders;

use App\Models\WalletBanner;
use Illuminate\Database\Seeder;

class WalletBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WalletBanner::create([
            'title' => 'Connect your wallet',
            'image' => 'wallet_banner.jpg',
        ]);
    }
}
