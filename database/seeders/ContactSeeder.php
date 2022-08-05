<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            'name'      => 'demo',
            'phone'     => '12345678',
            'email'     => 'demo@demo.com',
            'message'   => 'lorem ipsum',
        ]);
    }
}
