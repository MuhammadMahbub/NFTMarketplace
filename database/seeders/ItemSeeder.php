<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'category_id'=> 1,
            'name'=> 'Flourishing Cat #180',
            'slug'=> 'flourishing-cat-180-1',
            'image'=> 'item_1.jpg',
            'description'=> 'Neque aut veniam consectetur magnam libero, natus eius numquam reprehenderit hic at, excepturi repudiandae magni optio odio doloribus? Facilisi lobortisal morbi fringilla urna amet sed ipsum.',
            'price'=> 8.49,
            'quantity'=> 1,
            'creator_id'=> 3,
            'creator_loyalty'=> 10,
            'expire_date' => Carbon::today()->addDay(30)->format('Y-m-d'),
            'blockchain'=> 'Ethereum',
            'buy_button_text'=> 'Buy now',
            'view_button_text'=> 'View Details',
            'status' => 'hide',
            'created_at' => Carbon::createFromFormat('Y-m-d', '2022-07-21')->toDateTimeString(),
        ]);
        Item::create([
            'category_id'=> 2,
            'name'=> 'Amazing NFT art',
            'slug'=> 'amazing-n-f-t-art2',
            'image'=> 'item_2.jpg',
            'description'=> 'Neque aut veniam consectetur magnam libero, natus eius numquam reprehenderit hic at, excepturi repudiandae magni optio odio doloribus? Facilisi lobortisal morbi fringilla urna amet sed ipsum.',
            'price'=> 3.11,
            'quantity'=> 2,
            'creator_id'=> 1,
            'creator_loyalty'=> 10,
            'expire_date' => Carbon::today()->addDay(30)->format('Y-m-d'),
            'blockchain'=> 'Ethereum',
            'buy_button_text'=> 'Buy now',
            'view_button_text'=> 'View Details',
            'status' => 'show',
            'created_at' => Carbon::createFromFormat('Y-m-d', '2022-05-21')->toDateTimeString(),
        ]);
        Item::create([
            'category_id'=> 3,
            'name'=> 'SwagFox#133',
            'slug'=> 'swag-fox-133-3',
            'image'=> 'item_3.jpg',
            'description'=> 'Neque aut veniam consectetur magnam libero, natus eius numquam reprehenderit hic at, excepturi repudiandae magni optio odio doloribus? Facilisi lobortisal morbi fringilla urna amet sed ipsum.',
            'price'=> 8.49,
            'quantity'=> 1,
            'creator_id'=> 2,
            'creator_loyalty'=> 10,
            'expire_date' => Carbon::today()->addDay(30)->format('Y-m-d'),
            'blockchain'=> 'Ethereum',
            'buy_button_text'=> 'Buy now',
            'view_button_text'=> 'View Details',
            'status' => 'hide',
            'created_at' => Carbon::createFromFormat('Y-m-d', '2022-03-21')->toDateTimeString(),
        ]);
        Item::create([
            'category_id'=> 4,
            'name'=> 'Splendid Girl',
            'slug'=> 'splendid-girl-4',
            'image'=> 'item_4.jpg',
            'description'=> 'Neque aut veniam consectetur magnam libero, natus eius numquam reprehenderit hic at, excepturi repudiandae magni optio odio doloribus? Facilisi lobortisal morbi fringilla urna amet sed ipsum.',
            'price'=> 8.49,
            'quantity'=> 12,
            'blockchain'=> 'Ethereum',
            'creator_id'=> 1,
            'creator_loyalty'=> 10,
            'expire_date' => Carbon::today()->addDay(30)->format('Y-m-d'),
            'buy_button_text'=> 'Buy now',
            'view_button_text'=> 'View Details',
            'status' => 'show',
            'created_at' => Carbon::createFromFormat('Y-m-d', '2022-06-21')->toDateTimeString(),
        ]);
        Item::create([
            'category_id'=> 1,
            'name'=> 'Monkeyme#155',
            'slug'=> 'monkeyme-155-5',
            'image'=> 'item_5.jpg',
            'description'=> 'Neque aut veniam consectetur magnam libero, natus eius numquam reprehenderit hic at, excepturi repudiandae magni optio odio doloribus? Facilisi lobortisal morbi fringilla urna amet sed ipsum.',
            'price'=> 8.49,
            'quantity'=> 1,
            'creator_id'=> 2,
            'blockchain'=> 'Ethereum',
            'creator_loyalty'=> 10,
            'expire_date' => Carbon::today()->addDay(30)->format('Y-m-d'),
            'buy_button_text'=> 'Buy now',
            'view_button_text'=> 'View Details',
            'status' => 'hide',
            'created_at' => Carbon::createFromFormat('Y-m-d', '2022-06-21')->toDateTimeString(),
        ]);
        Item::create([
            'category_id'=> 2,
            'name'=> 'Jedidia#149',
            'slug'=> 'jedidia-149-6',
            'image'=> 'item_6.jpg',
            'description'=> 'Neque aut veniam consectetur magnam libero, natus eius numquam reprehenderit hic at, excepturi repudiandae magni optio odio doloribus? Facilisi lobortisal morbi fringilla urna amet sed ipsum.',
            'price'=> 8.49,
            'quantity'=> 1,
            'creator_id'=> 1,
            'blockchain'=> 'Ethereum',
            'creator_loyalty'=> 10,
            'expire_date' => Carbon::today()->addDay(30)->format('Y-m-d'),
            'buy_button_text'=> 'Buy now',
            'view_button_text'=> 'View Details',
            'status' => 'show',
            'created_at' => Carbon::createFromFormat('Y-m-d', '2022-04-21')->toDateTimeString(),
        ]);
        Item::create([
            'category_id'=> 3,
            'name'=> 'Artof Eve',
            'slug'=> 'artof-eve-7',
            'image'=> 'item_7.jpg',
            'description'=> 'Neque aut veniam consectetur magnam libero, natus eius numquam reprehenderit hic at, excepturi repudiandae magni optio odio doloribus? Facilisi lobortisal morbi fringilla urna amet sed ipsum.',
            'price'=> 8.49,
            'quantity'=> 1,
            'creator_id'=> 2,
            'blockchain'=> 'Ethereum',
            'creator_loyalty'=> 10,
            'expire_date' => Carbon::today()->addDay(30)->format('Y-m-d'),
            'buy_button_text'=> 'Buy now',
            'view_button_text'=> 'View Details',
            'status' => 'hide',
            'created_at' => Carbon::createFromFormat('Y-m-d', '2022-02-21')->toDateTimeString(),
        ]);
        Item::create([
            'category_id'=> 4,
            'name'=> 'Asuna #1649',
            'slug'=> 'asuna-1649-8',
            'image'=> 'item_8.jpg',
            'description'=> 'Neque aut veniam consectetur magnam libero, natus eius numquam reprehenderit hic at, excepturi repudiandae magni optio odio doloribus? Facilisi lobortisal morbi fringilla urna amet sed ipsum.',
            'price'=> 8.49,
            'quantity'=> 1,
            'creator_id'=> 1,
            'blockchain'=> 'Ethereum',
            'creator_loyalty'=> 10,
            'expire_date' => Carbon::today()->addDay(30)->format('Y-m-d'),
            'buy_button_text'=> 'Buy now',
            'view_button_text'=> 'View Details',
            'status' => 'show',
            'created_at' => Carbon::createFromFormat('Y-m-d', '2022-04-21')->toDateTimeString(),
        ]);
    }
}
