<?php

namespace Database\Seeders;

use App\Models\AboutCount;
use Illuminate\Database\Seeder;

class AboutCountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutCount::create([
            'title'                 => 'Numbers Speak',
            'founded'               => 'Founded',
            'founded_value'         => '2019',
            'trading_volume'        => 'Trading volume',
            'trading_volume_value'  => '$178M',
            'nft_created'           => 'NFTs Created',
            'nft_created_value'     => '305K',
            'total_users'           => 'Total Users',
            'total_users_value'     => '1.6M'
        ]);
    }
}
