<?php

namespace Database\Seeders;

use App\Models\PartnerSignUp;
use Illuminate\Database\Seeder;

class PartnerSignUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PartnerSignUp::create([
            'title'      => 'Interested In Becoming An Affiliate Partner?',
            'meta_title' => 'Join our mailing list to stay in the loop with our newest feature releases, NFT drops, and tips and tricks for navigating Xhibiter',
            'btn_text'   => 'Sign Up Now',
            'btn_url'    => '#'
        ]);
    }
}
