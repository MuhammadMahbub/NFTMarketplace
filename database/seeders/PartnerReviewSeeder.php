<?php

namespace Database\Seeders;

use App\Models\PartnerReview;
use Illuminate\Database\Seeder;

class PartnerReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PartnerReview::create([
            'comment'     => "Xhibiter is one of the most exciting, important companies in the world right now because it's the portal to the new digital economy. If you're interested in shaping a new business model for creators, this is the team to join.",
            'name'        => 'Katie Smith',
            'designation' => 'General Partner at Entrepreneur',
            'image'       => 'partnerImage.jpg'
        ]);
        PartnerReview::create([
            'comment'     => "Xhibiter is one of the most exciting, important companies in the world right now because it's the portal to the new digital economy. If you're interested in shaping a new business model for creators, this is the team to join.",
            'name'        => 'Mr X',
            'designation' => 'General Partner at Entrepreneur',
            'image'       => 'partnerImage1.jpg'
        ]);
        PartnerReview::create([
            'comment'     => "Xhibiter is one of the most exciting, important companies in the world right now because it's the portal to the new digital economy. If you're interested in shaping a new business model for creators, this is the team to join.",
            'name'        => 'Mr Y',
            'designation' => 'General Partner at Entrepreneur',
            'image'       => 'partnerImage2.jpg'
        ]);
    }
}
