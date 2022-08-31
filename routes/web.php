<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\TestController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\{LikeController,FAQController,BlogController,HomeController,ItemController,AboutController,AdminController,ContactController,PartnerController,ProductController,CategoryController,FrontendController,PlaceBidController,SocialurlController,SubscribeController,HelpCenterController,NewsletterController,SubscriberController,NFTCategoryController,TermServiceController,BlogCategoryController,ColorSettingController,ContactUsController,ThemeSettingController,GeneralSettingController, ItemReportController, StripePaymentController, WalletController};

// Frontend Routing
Route::group(['middleware' => 'visitor_log'], function(){
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::get('locale/{locale}', function($locale){
    Session::put('locale', $locale);
    return back();
})->name('locale');

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/help_center', [FrontendController::class, 'help_center'])->name('help_center');
Route::get('/platform_status', [FrontendController::class, 'platform_status'])->name('platform_status');
Route::get('/partners', [FrontendController::class, 'partners'])->name('partners');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/single/post/{slug}', [FrontendController::class, 'single_post'])->name('single_post');
Route::get('/newsletter', [FrontendController::class, 'newsletter'])->name('newsletter');
Route::get('/item/details/{slug}', [FrontendController::class, 'item_details'])->name('item_details');
Route::get('/explore_collections', [FrontendController::class, 'explore_collections'])->name('explore_collections');
Route::get('/collection/{id}', [FrontendController::class, 'collection'])->name('collection');
Route::get('/activity', [FrontendController::class, 'activity'])->name('activity');
Route::get('/rankings', [FrontendController::class, 'rankings'])->name('rankings');


Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/search-faq', [FrontendController::class, 'faqSearch'])->name('faqSearch');
Route::get('/wallet', [FrontendController::class, 'wallet'])->name('wallet');
Route::get('/terms/of/services', [FrontendController::class, 'terms_of_services'])->name('terms_of_services');
Route::post('/blogs/load-more',[FrontendController::class,'BlogsLoadMore'])->name('blogs.load-more');
Route::post('/user/subscribe', [SubscribeController::class, 'user_subscribe'])->name('subscribe.store');
Route::post('/contact-user/message', [FrontendController::class, 'guestUserMessage'])->name('guest.user');

// Search routes
Route::get('/search/item/', [FrontendController::class, 'search_item'])->name('search_item');
Route::get('/day/wise/search/item/{day}', [FrontendController::class, 'search_by_day'])->name('search_by_day');
Route::post('/search-by-last-data', [FrontendController::class, 'collectionFilterByDay'])->name('collections.filter');
Route::post('/filter-by-category', [FrontendController::class, 'filterByCategory'])->name('filterByCategory');
Route::post('/all/items', [FrontendController::class, 'allItems'])->name('allItems');
Route::post('user/all/items', [FrontendController::class, 'allItemsUser'])->name('allItemsUser');
Route::post('/all/items/collections', [FrontendController::class, 'allItemsCollection'])->name('allItemsCollection');
Route::post('/filter-by-category/collection', [FrontendController::class, 'filterByCategoryCollection'])->name('filterByCategoryCollection');
Route::post('/recent/items', [FrontendController::class, 'RecentItem'])->name('RecentItem');
Route::post('/recently/added/items', [FrontendController::class, 'RecentlyAdded'])->name('RecentlyAdded');
Route::post('/Low/To/High/items', [FrontendController::class, 'LowToHigh'])->name('LowToHigh');
Route::post('/high/To/low/items', [FrontendController::class, 'HighToLow'])->name('HighToLow');
Route::post('/recently/added/items/Collection', [FrontendController::class, 'RecentlyAddedCollection'])->name('RecentlyAddedCollection');
Route::post('/Low/To/High/items/Collection', [FrontendController::class, 'LowToHighCollection'])->name('LowToHighCollection');
Route::post('/high/To/low/items/Collection', [FrontendController::class, 'HighToLowCollection'])->name('HighToLowCollection');
Route::post('user/recently/added/items', [FrontendController::class, 'RecentlyAddedUser'])->name('RecentlyAddedUser');
Route::post('user/Low/To/High/items', [FrontendController::class, 'LowToHighUser'])->name('LowToHighUser');
Route::post('user/high/To/low/items', [FrontendController::class, 'HighToLowUser'])->name('HighToLowUser');

Route::get('/category/wise/{id}/item', [FrontendController::class, 'cat_wise_item'])->name('cat_wise_item');
Route::post('/filter-by-categories', [FrontendController::class, 'filterByCategoriesInUser'])->name('filterByCategoryInUser');
// Route::post('/filter-by-categories-in-profile', [FrontendController::class, "filterByCategoriesInCollection"])->name('onSaleFilter');
Route::get('/category/wise/{id}/item/search', [FrontendController::class, 'cat_wise_item_search'])->name('cat_wise_item_search');
Route::post('/category/wise/item/search', [FrontendController::class, 'filterCategoryByRange'])->name('filterCategoryByRange');
Route::post('/filter-by-price-in-profile', [FrontendController::class, 'filterByPriceRangeInCollection'])->name('filterByPriceRangeInCollection');
Route::get('/category/search/{id}/item', [FrontendController::class, 'cat_search_item'])->name('cat_search_item');
Route::get('/user/search/all/item/{user_id}', [FrontendController::class, 'user_search_all_item'])->name('user_search_all_item');
// Route::get('/user/search/category/{cat_id}/{user_id}/item', [FrontendController::class, 'user_search_cat_item'])->name('user_search_cat_item');
Route::post('/price/search/item/user', [FrontendController::class, 'search_price_by_user'])->name('search_price_by_user');
Route::post('/price/search/item', [FrontendController::class, 'search_by_price'])->name('search_by_price');
// Search routes end

Route::get('/user/{user_id}', [FrontendController::class, 'user'])->name('user');
Route::get('/item/refresh/metadata', [FrontendController::class, 'refresh_metadata'])->name('refresh_metadata');

Route::post('/users/store', [AdminController::class, 'userStore'])->name('register__user');

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/create/items', [ItemController::class, 'item_create'])->name('create');
    Route::post('/item/store/', [ItemController::class, 'itemStore'])->name('item_store');
    Route::get('/edit/profile/{slug}', [FrontendController::class, 'edit_profile'])->name('edit_profile');
    Route::put('/update/profile/{user_id}', [FrontendController::class, 'update_user_profile'])->name('update_user_profile');
    Route::get('user/edit/item/{slug}', [ItemController::class, 'user_edit_item'])->name('user_edit_item');
    Route::put('user/update/item/{id}', [ItemController::class, 'user_item_update'])->name('user_item_update');
    Route::put('user/update/password/{id}', [AdminController::class, 'update_password'])->name('update_password');

    Route::resource('place_bid', PlaceBidController::class);

    Route::post('/like/item', [LikeController::class, 'like_item'])->name('like_item');
    Route::post('/like/collection', [LikeController::class, 'like_collection'])->name('like_collection');
    Route::post('/like/user', [LikeController::class, 'like_user'])->name('like_user');
    Route::post('/like/user', [LikeController::class, 'like_user'])->name('like_user');
    Route::post('/report/to/user', [ItemreportController::class, 'report_to_user'])->name('report_to_user');
    Route::post('/report/to/category', [ItemreportController::class, 'report_to_category'])->name('report_to_category');
    Route::post('/Report-this-collection', [ItemReportController::class, 'problemStore'])->name('ItemReport.problemStore');

    Route::get('/notification-view/{id}', [NotificationController::class, 'notificationView'])->name('notification.view');

    // Route::get('/notification/status/{id}', [NotificationController::class, 'notify_status'])->name('notify_status');
    Route::post('/notification/seen/', [NotificationController::class, 'notification_seen'])->name('notification_seen');
    Route::get('all/read/notifications/{id}', [NotificationController::class, 'mark_all_notify'])->name('mark_all_notify');
    Route::get('all/view/notifications/{id}', [NotificationController::class, 'view_all_notify'])->name('view_all_notify');
    Route::post('multi/notifications', [NotificationController::class, 'multi_notify_delete'])->name('multi_notify_delete');
    Route::delete('multi/notifications/delete/{id}', [NotificationController::class, 'notify_destroy'])->name('notify_destroy');

});

Route::group(['prefix' => 'admin','middleware' => ['auth','check_role']], function(){
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/profile/edit/{slug}', [AdminController::class, 'profile_edit'])->name('profile_edit');
    Route::get('/profile/edit/password/{id}', [AdminController::class, 'profile_edit_password'])->name('reset.admin.password');
    Route::get('users/list', [AdminController::class, 'userList'])->name('users.index');
    Route::get('users/show/{id}', [AdminController::class, 'userShow'])->name('users.show');
    Route::get('users/create', [AdminController::class, 'userCreate'])->name('users.create');
    // Route::post('/users/store', [AdminController::class, 'userStore'])->name('register__user');
    Route::get('/user/edit/{id}', [AdminController::class, 'userEdit'])->name('users.edit');
    Route::get('/user/role/edit/{id}', [AdminController::class, 'userRoleEdit'])->name('users.role.edit');
    Route::put('/user/update/{id}', [AdminController::class, 'userUpdate'])->name('users.update');
    Route::put('/user/role/update/{id}', [AdminController::class, 'update_user_role'])->name('update_user_role');
    Route::delete('users/{id}/destroy', [AdminController::class, 'userDestroy'])->name('users.destroy');
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('help_center', HelpCenterController::class);
    Route::get('all/subscriber/', [SubscribeController::class, 'all_subscriber'])->name('all_subscriber');
    Route::delete('delete/subscriber/{id}', [SubscribeController::class, 'subs_destroy'])->name('subs_destroy');
    Route::get('help_center_title/create', [HelpCenterController::class, 'create_title'])->name('help_center_title.create');
    Route::put('help_center_title/update', [HelpCenterController::class, 'create_title_update'])->name('help_center_title.update');
    Route::resource('blog_category', BlogCategoryController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('newsletter', NewsletterController::class);
    Route::resource('faq', FAQController::class);
    Route::resource('term_service', TermServiceController::class);
    Route::resource('nft_category', NFTCategoryController::class);
    Route::resource('item', ItemController::class);
    Route::get('users/item/edit/{id}', [ItemController::class, 'item_edit'])->name('item_edit');
    Route::get('/item/status/edit/{id}', [ItemController::class, 'status_change'])->name('status_change');
    Route::put('users/item/update/{id}', [ItemController::class, 'item_update'])->name('item_update');
    Route::put('status/item/update/{id}', [ItemController::class, 'status_update'])->name('status_update');
    Route::resource('generalSettings', GeneralSettingController::class);
    Route::resource('colorSettings', ColorSettingController::class);
    Route::resource('socialurls', SocialurlController::class);
    Route::get('theme-color', [ThemeSettingController::class, 'color'])->name('theme.color');
    Route::get('theme-toggle', [ThemeSettingController::class, 'toggle'])->name('theme.toggle');
    Route::get('/banner', [HomeController::class, 'bannerIndex'])->name('banner.index');
    Route::post('/banner/update/{id}', [HomeController::class, 'bannerUpdate'])->name('banner.update');
    Route::get('/nft-module', [HomeController::class, 'nftModuleIndex'])->name('nftModule.index');
    Route::get('/nft-module/create', [HomeController::class, 'nftModuleCreate'])->name('nftModule.create');
    Route::post('/nft-module/store', [HomeController::class, 'nftModuleStore'])->name('nftModule.store');
    Route::get('/nft-module/edit/{id}', [HomeController::class, 'nftModuleEdit'])->name('nftModule.edit');
    Route::post('/nft-module/update/{id}', [HomeController::class, 'nftModuleUpdate'])->name('nftModule.update');
    Route::delete('/nft-module/delete/{id}', [HomeController::class, 'nftModuleDestroy'])->name('nftModule.destroy');
    Route::get('/home-titles', [HomeController::class, 'homeTitle'])->name('homeTitles.index');
    Route::post('/home-titles/update/{id}', [HomeController::class, 'homeTitleUpdate'])->name('homeTitles.update');
    Route::get('/partner-titles', [PartnerController::class, 'titleAndDescriptions'])->name('partner.titles');
    Route::put('/partner-titles/update/{id}', [PartnerController::class, 'titleAndDescriptionsUpdate'])->name('partnerTitles.update');
    Route::get('/partner-top-section', [PartnerController::class, 'partnerTopSection'])->name('partner.topSection');
    Route::put('/partner-top-section/update/{id}', [PartnerController::class, 'partnerTopSectionUpdate'])->name('partnerTopSection.update');
    Route::get('/partner-service-section/list', [partnerController::class, 'partnerServiceSectionIndex'])->name('partner.service.index');
    Route::get('/partner-service-section/create', [partnerController::class, 'partnerServiceSectionCreate'])->name('partner.service.create');
    Route::post('/partner-service-section/store', [partnerController::class, 'partnerServiceSectionStore'])->name('partner.service.store');
    Route::get('/partner-service-section/edit/{id}', [partnerController::class, 'partnerServiceSectionEdit'])->name('partner.service.edit');
    Route::put('/partner-service-section/update/{id}', [partnerController::class, 'partnerServiceSectionUpdate'])->name('partner.service.update');
    Route::delete('/partner-service-delete/{id}', [PartnerController::class, 'partnerServiceSectionDelete'])->name('partner.service.destroy');
    Route::get('/partner-service-section/list', [PartnerController::class, 'partnerServiceSectionIndex'])->name('partner.service.index');
    Route::get('/partner-service-section/create', [PartnerController::class, 'partnerServiceSectionCreate'])->name('partner.service.create');
    Route::post('/partner-service-section/store', [PartnerController::class, 'partnerServiceSectionStore'])->name('partner.service.store');
    Route::get('/partner-service-section/edit/{id}', [partnerController::class, 'partnerServiceSectionEdit'])->name('partner.service.edit');
    Route::put('/partner-service-section/update/{id}', [PartnerController::class, 'partnerServiceSectionUpdate'])->name('partner.service.update');
    Route::delete('/partner-service-delete/{id}', [PartnerController::class, 'partnerServiceSectionDelete'])->name('partner.service.destroy');
    Route::get('/partner-review/list', [PartnerController::class, 'partnerReviewIndex'])->name('partner.review.index');
    Route::get('/partner-review/create', [PartnerController::class, 'partnerReviewCreate'])->name('partner.review.create');
    Route::post('/partner-review/store', [PartnerController::class, 'partnerReviewStore'])->name('partner.review.store');
    Route::get('/partner-review/edit/{id}', [partnerController::class, 'partnerReviewEdit'])->name('partner.review.edit');
    Route::post('/partner-review/update/{id}', [PartnerController::class, 'partnerReviewUpdate'])->name('partner.review.update');
    Route::delete('/partner-review/{id}', [PartnerController::class, 'partnerReviewDestroy'])->name('partner.review.destroy');
    Route::get('/partner-signUp', [PartnerController::class, 'partnerSignUpIndex'])->name('partner.signUp.index');
    Route::put('/partner-signUp/update/{id}', [PartnerController::class, 'partnerSignUpUpate'])->name('partner.signUp.update');
    Route::get('/partner-brandImage', [PartnerController::class, 'partnerBrandImageIndex'])->name('partner.brandImage.index');
    Route::get('/partner-brandImage/create', [PartnerController::class, 'partnerBrandImageCreate'])->name('partner.brandImage.create');
    Route::post('/partner-brandImage/store', [PartnerController::class, 'partnerBrandImageStore'])->name('partner.brandImage.store');
    Route::get('/partner-brandImage/edit/{id}', [PartnerController::class, 'partnerBrandImageEdit'])->name('partner.brandImage.edit');
    Route::put('/partner-brandImage/update/{id}', [PartnerController::class, 'partnerBrandImageUpdate'])->name('partner.brandImage.update');
    Route::delete('/partner-brandImage/delete/{id}', [PartnerController::class, 'partnerBrandImageDestroy'])->name('partner.brandImage.destroy');
    Route::get('/about-header', [AboutController::class, 'aboutHeaderIndex'])->name('about.header');
    Route::put('/about-header/update/{id}', [AboutController::class, 'aboutHeaderUpdate'])->name('about.header.update');
    Route::get('/about-count', [AboutController::class, "aboutCountIndex"])->name('about.count');
    Route::put('/about-count/update/{id}', [AboutController::class, "aboutCountUpdate"])->name('about.count.update');
    Route::get('/team-banner', [AboutController::class, 'teamBannerIndex'])->name('team.banner');
    Route::put('/team-banner/update/{id}', [AboutController::class, 'teamBannerUpdate'])->name('team.banner.update');
    Route::get('/team', [AboutController::class, 'teamIndex'])->name('team');
    Route::get('/team/create', [AboutController::class, 'teamCreate'])->name('team.create');
    Route::post('/team/store', [AboutController::class, 'teamStore'])->name('team.store');
    Route::get('/team/edit/{id}', [AboutController::class, 'teamEdit'])->name('team.edit');
    Route::put('/team/update/{id}', [AboutController::class, 'teamUpdate'])->name('team.update');
    Route::delete('/team/delete/{id}', [AboutController::class, 'teamDestroy'])->name('team.destroy');
    Route::get('/contact-us/titles', [ContactUsController::class, 'contactUsTitlesIndex'])->name('contactUs');
    Route::put('/contact-us/titles/update/{id}', [ContactUsController::class, 'contactUsTitlesUpdate'])->name('contactUs.titles.update');
    Route::get('/contact-address', [ContactUsController::class, 'contactAddress'])->name('contact.address');
    Route::put('/contact-address/update/{id}', [ContactUsController::class, 'contactAddressUpdate'])->name('contact.address.update');
    Route::get('/wallet/banner', [WalletController::class, 'walletBanner'])->name('wallet.banner');
    Route::post('/wallet-banner/update/{id}', [WalletController::class, 'walletBannerUpdate'])->name('walletBanner.update');
    Route::get('/wallet/services', [WalletController::class, 'walletServices'])->name('wallet.services');
    Route::get('/wallet/services/create', [WalletController::class, 'walletServicesCreate'])->name('wallet.services.create');
    Route::post('/wallet/services/store', [WalletController::class, 'walletServicesStore'])->name('wallet.services.store');
    Route::get('/wallet/services/edit/{id}', [WalletController::class, 'walletServicesEdit'])->name('wallet.services.edit');
    Route::put('/wallet/services/update/{id}', [WalletController::class, 'walletServicesUpdate'])->name('wallet.services.update');
    Route::delete('/wallet/services/delete/{id}', [WalletController::class, 'walletServicesDelete'])->name('wallet.services.destroy');
    Route::resource('ItemReport', ItemReportController::class);
    Route::get('/item-reports', [ItemReportController::class, 'seeReport'])->name('seeReport');
    Route::get('/user-reports', [ItemReportController::class, 'userReportIndex'])->name('user.report.index');
    Route::get('/liked/items', [LikeController::class, 'liked_items'])->name('liked_items');
    Route::get('/bid/items', [PlaceBidController::class, 'bid_items'])->name('bid_items');
    Route::delete('/bid/destroy/{id}', [PlaceBidController::class, 'bid_destroy'])->name('bid_destroy');
    Route::delete('/item-reports-delete/{id}', [ItemReportController::class, 'ItemProblemDestroy'])->name('ItemProblem.destroy');
    Route::delete('/item/liked/delete/{id}', [ItemReportController::class, 'like_item_destroy'])->name('like_item_destroy');
    Route::delete('/delete/user/report/message/{id}', [ItemReportController::class, 'user_report_destroy'])->name('user_report_destroy');
    Route::delete('/delete/category/report/message/{id}', [ItemReportController::class, 'report_cat_destroy'])->name('report_cat_destroy');
    Route::get('/show/user/message', [ContactUsController::class, 'userMessage'])->name('userMessage');
    Route::delete('/delete/user/message/{id}', [ContactUsController::class, 'userMessageDestroy'])->name('userMessage.destroy');
    Route::get('/item-reports-index', [ItemReportController::class, 'ItemProblem'])->name('ItemProblem.index');
    Route::get('/item/report/on_category/index', [ItemReportController::class, 'report_on_category'])->name('report_on_category');
    // Route::get('/item-reports-index', [ItemReportController::class, 'showLike'])->name('showLike.index');
    Route::delete('/item-report/delete/{id}', [ItemReportController::class, 'ItemProblemsDestroy'])->name('ItemProblems.destroy');
    Route::get('/platform/titles', [FrontendController::class, 'platformTitles'])->name('platform.titles');
    Route::put('/platform/titles/update/{id}', [FrontendController::class, 'updatePlatformTitles'])->name('platformTitles.update');
    Route::get('/subscribers/list', [FrontendController::class, 'showSubscriber'])->name('subscriber.index');
    Route::delete('/subscriber/delete/{id}', [FrontendController::class, 'destroySubscriber'])->name('subscribers.delete');
    Route::get('/login-page-design', [FrontendController::class, 'loginPageResources'])->name('login.page.design');
    Route::put('/login-page-design-update/{id}', [FrontendController::class, 'loginPageResourcesUpdate'])->name('login.page.design.update');
    Route::delete('delete/bulk/notification', [NotificationController::class, 'delete_bulk_notification'])->name('delete.bulk.notification');
    Route::post('filter/by/all/notification', [NotificationController::class, 'filter_by_all_notification'])->name('filter.by.all.notification');
    Route::post('filter/by/single/notification', [NotificationController::class, 'filter_by_single_notification'])->name('filter.by.single.notification');

});
Route::get('/forget/password', [FrontendController::class, 'passwordReset'])->name('forget.password');
Route::resource('contacts', ContactController::class);
Route::resource('subscribers', SubscriberController::class);

