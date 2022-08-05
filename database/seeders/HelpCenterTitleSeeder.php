<?php

namespace Database\Seeders;

use App\Models\HelpCenterTitle;
use Illuminate\Database\Seeder;

class HelpCenterTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HelpCenterTitle::create([
            'help_center_title' => 'How can I help you?',
            'bg_image'          => 'default.jpg',
            'category_title'    => 'Or browse categories',
            'faq_title'         => 'Frequently asked questions',
            'faq_meta_title'    => 'Join our community now to get free updates and also alot of freebies are waiting for you or',
        ]);
    }
}
