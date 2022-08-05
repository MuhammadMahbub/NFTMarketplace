<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'category_id' => 1,
            'name' => 't-shirt',
            'price' => '580',
            'quantity' => '50',
            'image' => 'shirt.jpg',
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'sari',
            'price' => '1490',
            'quantity' => '50',
            'image' => 'sari.jpg',
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'laptop',
            'price' => '33490',
            'quantity' => '50',
            'image' => 'laptop.jpg',
        ]);
    }
}
