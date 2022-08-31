<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::create([
            'category_id'    => 1,
            'user_id'        => 1,
            'title'          => 'List your collection for secondary sales',
            'slug'           => 'list-your-collection-for-secondary-sales',
            'subtitle'       => 'A Picture is Worth a Thousand Words',
            'author_name'    => 'author1',
            'main_image'     => 'main_image.jpg',
            'image1'         => 'image1.jpg',
            'image2'         => 'image2.jpg',
            'quote'          => 'Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis.',
            'quote_name'     => 'Vincent De Paul',
            'description'    => 'Since we launched Tezos at the end of 2021, many awesome creator. From a barely understood    abbreviation (hello, right click savers!), it turned into a massive cultural phenomenon adopted by blue chip companies like Adidas and Twitter in a few short months.
                                Just like the NFT space has grown, so has Rarible.com. What started with a few people in a café grew into a passionate team of over 100, and counting!
                                And that team has been busy. In 2021, weve shipped more features than ever before, scaled to a multi-chain platform with Flow and Tezos integrations, and watched our community soar on every social media channel.
                                And of course, we could not have done it without you! You are creating Rarible day by day - by using the platform, requesting features, sharing your feedback, being as active and passionate as you are.',
            'author_comment' => 'Aenean commodo ligula eget dolor. Aenean massa. Cum sociis Theme natoque penatibus et magnis dis parturient montes.',
            'author_facebook'=> "https://www.facebook.com",
            'author_twitter' => "https://www.twitter.com",
            'author_discord' => "https://www.discord.com",
            'created_at'      => Carbon::createFromFormat('Y-m-d', '2022-05-21')->toDateTimeString(),
        ]);

        Blog::create([
            'category_id'    => 2,
            'user_id'        => 1,
            'title'          => 'Mint your own Tezos collections',
            'slug'           => 'mint-your-own-Tezos-collections',
            'subtitle'       => 'Since we launched Tezos at the end of 2021, many awesome creators.',
            'author_name'    => 'author2',
            'main_image'     => 'main_image1.jpg',
            'image1'         => 'image1.jpg',
            'image2'         => 'image2.jpg',
            'quote'          => 'Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis.',
            'quote_name'     => 'Vincent De Paul',
            'description'    => 'Since we launched Tezos at the end of 2021, many awesome creator. From a barely understood    abbreviation (hello, right click savers!), it turned into a massive cultural phenomenon adopted by blue chip companies like Adidas and Twitter in a few short months.
                                Just like the NFT space has grown, so has Rarible.com. What started with a few people in a café grew into a passionate team of over 100, and counting!
                                And that team has been busy. In 2021, weve shipped more features than ever before, scaled to a multi-chain platform with Flow and Tezos integrations, and watched our community soar on every social media channel.
                                And of course, we could not have done it without you! You are creating Rarible day by day - by using the platform, requesting features, sharing your feedback, being as active and passionate as you are.',
            'author_comment' => 'Aenean commodo ligula eget dolor. Aenean massa. Cum sociis Theme natoque penatibus et magnis dis parturient montes.',
            'author_facebook'=> "https://www.facebook.com",
            'author_twitter' => "https://www.twitter.com",
            'author_discord' => "https://www.discord.com",
            'created_at'      => Carbon::createFromFormat('Y-m-d', '2022-04-21')->toDateTimeString(),
        ]);

        Blog::create([
            'category_id'    => 2,
            'user_id'        => 1,
            'title'          => 'List your collection for secondary sales',
            'slug'           => 'a-picture-is-worth-a-thousand-ords',
            'subtitle'       => 'A Picture is Worth a Thousand Words',
            'author_name'    => 'author2',
            'main_image'     => 'main_image2.jpg',
            'image1'         => 'image1.jpg',
            'image2'         => 'image2.jpg',
            'quote'          => 'Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis.',
            'quote_name'     => 'Vincent De Paul',
            'description'    => 'Since we launched Tezos at the end of 2021, many awesome creator. From a barely understood    abbreviation (hello, right click savers!), it turned into a massive cultural phenomenon adopted by blue chip companies like Adidas and Twitter in a few short months.
                                Just like the NFT space has grown, so has Rarible.com. What started with a few people in a café grew into a passionate team of over 100, and counting!
                                And that team has been busy. In 2021, weve shipped more features than ever before, scaled to a multi-chain platform with Flow and Tezos integrations, and watched our community soar on every social media channel.
                                And of course, we could not have done it without you! You are creating Rarible day by day - by using the platform, requesting features, sharing your feedback, being as active and passionate as you are.',
            'author_comment' => 'Aenean commodo ligula eget dolor. Aenean massa. Cum sociis Theme natoque penatibus et magnis dis parturient montes.',
            'author_facebook'=> "https://www.facebook.com",
            'author_twitter' => "https://www.twitter.com",
            'author_discord' => "https://www.discord.com",
            'created_at'     => Carbon::createFromFormat('Y-m-d', '2022-01-21')->toDateTimeString(),
        ]);
    }
}
