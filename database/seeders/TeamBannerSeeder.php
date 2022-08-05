<?php

namespace Database\Seeders;

use App\Models\TeamBanner;
use Illuminate\Database\Seeder;

class TeamBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeamBanner::create([
            'title'                    => "Get Experience. We're A Results Driven Team.",
            'meta_title'               => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam',
            'description'              => "Every digital creation available through MakersPlace is an authentic and truly unique digital creation, signed and issued by the creator — made possible by blockchain technology. Even if the digital creation is copied, it won't be the authentic and originally signed version.",
            'image'                    => 'teamBanner.jpg',
            'launch_product_text'      => 'Products launched',
            'launch_product_text_value'=> '11.2k',
            'satisfaction_rate'        => 'Satisfaction Rate',
            'satisfaction_rate_value'  => '99.7%',
            'image'                    => 'default.jpg'
        ]);
    }
}
