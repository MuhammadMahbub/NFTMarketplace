<?php

namespace Database\Seeders;

use App\Models\ContactAddress;
use Illuminate\Database\Seeder;

class ContactAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactAddress::create([
            'phone_title'   => 'Phone',
            'phone_icon'    => '<i class="fa-solid fa-phone-missed"></i>',
            'phone'         => '(123) 123-456',
            'address_title' => 'Address',
            'address_icon'  => '<i class="fa-solid fa-location-dot"></i>',
            'address'       => '08 W 36th St, New YorkNY 10001',
            'email_title'   => 'Email',
            'email_icon'    => '<i class="fa-solid fa-circle-envelope"></i>',
            'email'         => 'office@xhibiter.com'
        ]);
    }
}
