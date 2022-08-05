<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\ThemeSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user1 =  User::create([
            'name'               => 'Admin',
            'role_id'            => 1,
            'email'              => 'admin@admin.com',
            'password'           => bcrypt('@@Bladepro@123@@'),
            'username'           => 'Admin',
            'slug'               => 'i-make-art-with-the-simple-goal-1',
            'bio'                => 'I make art with the simple goal of giving you something pleasing to look at for a few seconds.',
            'profile_photo_path' => 'profilePhoto.gif',
            'cover_photo_path'   => 'coverPhoto.jpg',
            'wallet_address'     => 'Demo1',
            'created_at'         => Carbon::now(),
        ]);

        $user2 = User::create([
            'name'               => 'Creator',
            'role_id'            => 2,
            'email'              => 'creator@creator.com',
            'password'           => bcrypt('@@Bladepro@123@@'),
            'username'           => '051_Creator',
            'slug'               => 'i-make-art-with-the-simple-goal-2',
            'bio'                => 'I make art with the simple goal of giving you something pleasing to look at for a few seconds.',
            'profile_photo_path' => 'profilePhoto.gif',
            'cover_photo_path'   => 'coverPhoto.jpg',
            'wallet_address'     => 'Demo2',
            'created_at'         => Carbon::now(),
        ]);

        $user3 = User::create([
            'name'               => 'User',
            'role_id'            => 2,
            'email'              => 'user@user.com',
            'password'           => bcrypt('@@Bladepro@123@@'),
            'username'           => '051_Owner',
            'slug'               => 'i-make-art-with-the-simple-goal-3',
            'bio'                => 'I make art with the simple goal of giving you something pleasing to look at for a few seconds.',
            'profile_photo_path' => 'profilePhoto.gif',
            'cover_photo_path'   => 'coverPhoto.jpg',
            'wallet_address'     => 'Demo3',
            'created_at'         => Carbon::now(),
        ]);

        ThemeSetting::create([
            'user_id' => $user1->id,
            'created_at' => Carbon::now(),
        ]);
        ThemeSetting::create([
            'user_id' => $user2->id,
            'created_at' => Carbon::now(),
        ]);
        ThemeSetting::create([
            'user_id' => $user3->id,
            'created_at' => Carbon::now(),
        ]);
    }
}
