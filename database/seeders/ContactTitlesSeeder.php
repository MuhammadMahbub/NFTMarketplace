<?php

namespace Database\Seeders;

use App\Models\ContactTitles;
use Illuminate\Database\Seeder;

class ContactTitlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactTitles::create([
            'title'              => 'Get in touch',
            'image'              => 'default.jpg',
            'form_title'         => 'Contact Us',
            'form_meta_title'    => "Have a question? Need help? Don't hesitate, drop us a line",
            'address_title'      => 'Information',
            'address_meta_title' => "Don't hesitaste, drop us a line Collaboratively administrate channels whereas virtual. Objectively seize scalable metrics whereas proactive e-services.",
        ]);
    }
}
