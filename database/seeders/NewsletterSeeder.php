<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Newsletter;

class NewsletterSeeder extends Seeder
{
    public function run()
    {
       Newsletter::create([
        'title'      => 'Sign up for The Tide, Xhibiter newsletter!',
        'meta_title' => 'Join our mailing list to stay in the loop with our newest feature releases, NFT drops, and tips and tricks for navigating Xhibiter',
        'image'      => 'newsletter.jpg'
       ]);
    }
}
