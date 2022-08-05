<?php

namespace Database\Seeders;

use App\Models\HelpCenter;
use Illuminate\Database\Seeder;

class HelpCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     HelpCenter::create([
        'title' => 'Started',
        'description' => 'Learn how to create an account, set up your wallet, and what you can do.',
     ]);
     HelpCenter::create([
        'title' => 'Buying',
        'description' => 'Learn how to create an account, set up your wallet, and what you can do.',
     ]);
     HelpCenter::create([
        'title' => 'Selling',
        'description' => 'Learn how to create an account, set up your wallet, and what you can do.',
     ]);
     HelpCenter::create([
        'title' => 'Creating',
        'description' => 'Learn how to create an account, set up your wallet, and what you can do.',
     ]);
     HelpCenter::create([
        'title' => 'User Safety',
        'description' => 'Learn how to create an account, set up your wallet, and what you can do.',
     ]);
     HelpCenter::create([
        'title' => 'Partner',
        'description' => 'Learn how to create an account, set up your wallet, and what you can do.',
     ]);
    }
}
