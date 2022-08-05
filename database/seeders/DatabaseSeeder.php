<?php

namespace Database\Seeders;

use App\Models\NFTCategory;
use App\Models\NftModule;
use App\Models\PartnerSignUp;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            SocialUrlSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            GeneralSettingSeeder::class,
            HelpCenterTitleSeeder::class,
            BlogCategorySeeder::class,
            BlogSeeder::class,
            NewsletterSeeder::class,
            BannerSeeder::class,
            TermServiceSeeder::class,
            NFTCategorySeeder::class,
            NftModuleSeeder::class,
            HomeTitleSeeder::class,
            PartnerTopSectionSeeder::class,
            PartnerServiceSeeder::class,
            ItemSeeder::class,
            FAQSeeder::class,
            PartnerTitlesSeeder::class,
            PartnerReviewSeeder::class,
            PartnerSignUpSeeder::class,
            PartnerBrandImageSeeder::class,
            AboutHeaderSeeder::class,
            AboutCountSeeder::class,
            TeamSeeder::class,
            TeamBannerSeeder::class,
            ContactTitlesSeeder::class,
            ContactAddressSeeder::class,
            WalletBannerSeeder::class,
            WalletServicesSeeder::class,
            HelpCenterSeeder::class,
            ItemReportSeeder::class,
            PlatformTitlesSeeder::class,
            LoginPageSeeder::class,
        ]);
    }
}
