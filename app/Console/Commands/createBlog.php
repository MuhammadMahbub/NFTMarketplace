<?php

namespace App\Console\Commands;

use App\Models\Blog;
use Illuminate\Console\Command;

class createBlog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:blog {--count=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for create blog';

    public function handle()
    {
        $count = $this->option('count');
        $bar = $this->output->createProgressBar($count);
        $bar->start();
        for($i = 1; $i <= $count; $i++){

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
                'author_image'   => 'author.jpg',
                'quote'          => 'Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis.',
                'quote_name'     => 'Vincent De Paul',
                'description'    => 'Since we launched Tezos at the end of 2021, many awesome creator. From a barely understood    abbreviation (hello, right click savers!), it turned into a massive cultural phenomenon adopted by blue chip companies like Adidas and Twitter in a few short months.
                                    Just like the NFT space has grown, so has Rarible.com. What started with a few people in a café grew into a passionate team of over 100, and counting!
                                    And that team has been busy. In 2021, weve shipped more features than ever before, scaled to a multi-chain platform with Flow and Tezos integrations, and watched our community soar on every social media channel.
                                    And of course, we could not have done it without you! You are creating Rarible day by day - by using the platform, requesting features, sharing your feedback, being as active and passionate as you are.',
                'author_comment' => 'Aenean commodo ligula eget dolor. Aenean massa. Cum sociis Theme natoque penatibus et magnis dis parturient montes.'
            ]);
            $bar->advance();
        }
        $bar->finish();
        $this->info('Successfully Created ' . $count . "Fake Blog !");
    }
}
