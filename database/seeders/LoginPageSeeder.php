<?php

namespace Database\Seeders;

use App\Models\LoginSignUpPage;
use Illuminate\Database\Seeder;

class LoginPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LoginSignUpPage::Create([
            'logo'            => 'logo_white.png',
            'banner_image'    => 'login.jpg',
            'login_title'     => 'Stay Connected',
            'login_sub_title' => 'Choose one of available wallet providers or create a new wallet.',
        ]);
    }
}
