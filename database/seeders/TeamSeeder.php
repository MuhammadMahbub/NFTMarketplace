<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::create([
            'image'        => 'team_1.jpg',
            'name'         => 'Alex Grey',
            'designation'  => 'CEO, Director',
            'linkedin_url' => '#',
            'facebook_url' => '#',
            'twitter_url'  => '#',
        ]);
        Team::create([
            'image'        => 'team_2.jpg',
            'name'         => 'Ashton Kutsher',
            'designation'  => 'Entrepreneur & Author',
            'linkedin_url' => '#',
            'facebook_url' => '#',
            'twitter_url'  => '#',
        ]);
        Team::create([
            'image'        => 'team_3.jpg',
            'name'         => 'John Ferris',
            'designation'  => 'Developer & Investor',
            'linkedin_url' => '#',
            'facebook_url' => '#',
            'twitter_url'  => '#',
        ]);
        Team::create([
            'image'        => 'team_4.jpg',
            'name'         => 'Belinda Bing',
            'designation'  => 'Former COO Shopee',
            'linkedin_url' => '#',
            'facebook_url' => '#',
            'twitter_url'  => '#',
        ]);
        Team::create([
            'image'        => 'team_5.jpg',
            'name'         => 'Camille Alforque',
            'designation'  => 'Chief Creative officer',
            'linkedin_url' => '#',
            'facebook_url' => '#',
            'twitter_url'  => '#',
        ]);
        Team::create([
            'image'        => 'team_6.jpg',
            'name'         => 'Nathaniel Ragpa',
            'designation'  => 'Front-end Developer',
            'linkedin_url' => '#',
            'facebook_url' => '#',
            'twitter_url'  => '#',
        ]);
        Team::create([
            'image'        => 'team_7.jpg',
            'name'         => 'Linda Brown',
            'designation'  => 'Marketing Officer',
            'linkedin_url' => '#',
            'facebook_url' => '#',
            'twitter_url'  => '#',
        ]);
        Team::create([
            'image'        => 'team_8.jpg',
            'name'         => 'Gavin Silberman',
            'designation'  => 'Designer & Investor',
            'linkedin_url' => '#',
            'facebook_url' => '#',
            'twitter_url'  => '#',
        ]);
        Team::create([
            'image'        => 'team_9.jpg',
            'name'         => 'Masha Smith',
            'designation'  => 'VP Communications',
            'linkedin_url' => '#',
            'facebook_url' => '#',
            'twitter_url'  => '#',
        ]);
    }
}
