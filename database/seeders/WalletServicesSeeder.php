<?php

namespace Database\Seeders;

use App\Models\WalletServices;
use Illuminate\Database\Seeder;

class WalletServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WalletServices::Create([
            'image'      => 'metamask.svg',
            'title'      => 'Metamask',
            'description' => 'Start exploring blockchain applications in seconds. Trusted by over 1 million users worldwide.',
        ]);
        WalletServices::Create([
            'image'      => 'coinbase.svg',
            'title'      => 'Coinbase',
            'description' => 'The easiest and most secure crypto wallet. ... No Coinbase account required.',
        ]);
        WalletServices::Create([
            'image'      => 'bitski.svg',
            'title'      => 'Bitski',
            'description' => 'Bitski connects communities, creators and brands through unique, ownable digital content.',
        ]);
        WalletServices::Create([
            'image'      => 'fortmatic.svg',
            'title'      => 'Fortmatic',
            'description' => 'Let users access your Ethereum app from anywhere. No more browser extensions.',
        ]);
        WalletServices::Create([
            'image'      => 'torus.svg',
            'title'      => 'Torus',
            'description' => 'Open source protocol for connecting decentralised applications to mobile wallets.',
        ]);
        WalletServices::Create([
            'image'      => 'wallet_connect.svg',
            'title'      => 'Walletconnect',
            'description' => 'Open source protocol for connecting decentralised applications to mobile wallets.',
        ]);
    }
}
