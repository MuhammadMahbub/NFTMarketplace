<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\ItemReport;
use App\Models\ItemProblem;
use App\Models\ItemProperty;
use Illuminate\Http\Request;
use App\Models\PlatformTitles;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\Models\{Blog,Item,Team,User,Guest,Banner,TeamBanner,TermService,PlaceBid,HomeTitle,NftModule,NFTCategory,AboutCount,Newsletter,AboutHeader,ContactTitles,PartnerReview,PartnerSignUp,PartnerTitles,ContactAddress, FAQ, PartnerService,GuestUserMessage, HelpCenter, LoginSignUpPage, PartnerBrandImage,PartnerTopSection, Subscribe, WalletBanner,WalletServices};


class FrontendController extends Controller
{
    public function index(){
        return view('frontend_pages.home', [
            'homeTitle'     => HomeTitle::first(),
            'nftModules'    => NftModule::all(),
            'banner'        => Banner::first(),
            'newsletter'    => Newsletter::first(),
            'latest_items'  => Item::where('status','show')->latest()->limit(6)->get(),
            'all_items'     => Item::where('status','show')->latest()->get(),
            'items'         => Item::where('status','show')->latest()->get(),
        ]);
    }

    public function search_item(Request $request){
        $all_items = Item::where('status','show')->where('name','LIKE', '%'.$request->search_item.'%')->latest()->get();

        return view('frontend_pages.pages.explore_collections', [
            'all_items' => $all_items,
        ]);

    }

    public function search_by_day($day){
        $date = \Carbon\Carbon::today()->subDays($day);

        return view('frontend_pages.home', [
            'homeTitle'     => HomeTitle::first(),
            'nftModules'    => NftModule::all(),
            'banner'        => Banner::first(),
            'newsletter'    => Newsletter::first(),
            'latest_items'  => Item::where('status','show')->latest()->limit(6)->get(),
            'all_items'     => Item::where('status','show')->where('created_at', '>=', $date)->get(),
            'items'         => Item::where('status','show')->latest()->get(),
        ]);

    }

    public function collectionFilterByDay(Request $request){
        $date = \Carbon\Carbon::today()->subDays($request->day);
        $all_items = Item::where('status','show')->where('created_at', '>=', $date)->get();
        $view = view('frontend_pages.resources.searchByDay', compact('all_items'));

        $data = $view->render();

        return response()->json(['data'=> $data]);
    }

    public function allItems(Request $request){
        $items = Item::where('status','show')->latest()->get();
        $view = view('frontend_pages.resources.filterByCategory', compact('items'));

        $data = $view->render();

        return response()->json(['data'=> $data]);
    }

    public function allItemsCollection(Request $request){
        $all_items = Item::where('status','show')->latest()->get();
        $view = view('frontend_pages.resources.filterByExplore', compact('all_items'));

        $data = $view->render();

        return response()->json(['data'=> $data]);
    }

    public function filterByCategoryCollection(Request $request){
        $all_items = Item::where('status','show')->where('category_id',$request->cat_id)->get();
        $view = view('frontend_pages.resources.filterByExplore', compact('all_items'));

        $data = $view->render();

        return response()->json(['data'=> $data]);
    }

    public function RecentItem(Request $request){
        $all_items = Item::where('status','show')->latest()->get();
        $view = view('frontend_pages.resources.filterByExplore', compact('all_items'));

        $data = $view->render();

        return response()->json(['data'=> $data]);
    }

    public function RecentlyAdded(Request $request){
        // dd($request->category_id);
        if($request->category_id == 'all'){
            $items = Item::where('status','show')->latest()->get();
        }else{
            $items = Item::where('status','show')->where('category_id', $request->category_id)->latest()->get();
        }
        $view = view('frontend_pages.resources.filterByCategory', ['items' => $items]);

        $data = $view->render();

        return response()->json(['data'=> $data]);
    }

    public function LowToHigh(Request $request){

        if ($request->category_id == 'all') {
            $items = Item::where('status','show')->orderBy('price','ASC')->get();
        } else {
            $items = Item::where('status','show')->where('category_id',$request->category_id)->orderBy('price','ASC')->get();
        }
        $view = view('frontend_pages.resources.filterByCategory', ['items' => $items]);

        $data = $view->render();

        return response()->json(['data'=> $data]);
    }

    public function HighToLow(Request $request){
        if($request->category_id == 'all'){
            $items = Item::where('status','show')->orderBy('price','DESC')->get();
        }else{
            $items = Item::where('status','show')->where('category_id', $request->category_id)->orderBy('price','DESC')->get();
        }
        $view = view('frontend_pages.resources.filterByCategory', ['items' => $items]);

        $data = $view->render();

        return response()->json(['data'=> $data]);
    }

    public function allItemsUser(Request $request){
        $user_items = Item::where('creator_id', $request->user_id)->where('status','show')->get();

        $data = view('frontend_pages.resources.filterByUser', compact('user_items'))->render();

        return response()->json(['data'=> $data]);
    }

    public function RecentlyAddedUser(Request $request){
        $user_items = Item::where('status','show')->where('creator_id', $request->user_id)->where('category_id', $request->category_id)->latest()->get();

        $data = view('frontend_pages.resources.filterByUser', compact('user_items'))->render();

        return response()->json(['data'=> $data]);
    }

    public function LowToHighUser(Request $request){
        if($request->category_id == 'all'){
            $user_items = Item::where('status','show')->where('creator_id', $request->user_id)->orderBy('price','ASC')->get();
        }else{
            $user_items = Item::where('status','show')->where('category_id',$request->category_id)->where('creator_id', $request->user_id)->orderBy('price','ASC')->get();
        }

        $data = view('frontend_pages.resources.filterByUser', compact('user_items'))->render();

        return response()->json(['data'=> $data]);
    }

    public function HighToLowUser(Request $request){
        if($request->category_id == 'all'){
            $user_items = Item::where('status','show')->where('creator_id', $request->user_id)->orderBy('price','DESC')->get();
        }else{
            $user_items = Item::where('status','show')->where('category_id',$request->category_id)->where('creator_id', $request->user_id)->orderBy('price','DESC')->get();
        }

        $data = view('frontend_pages.resources.filterByUser', compact('user_items'))->render();

        return response()->json(['data'=> $data]);
    }

    public function RecentlyAddedCollection(Request $request){
        $items = Item::where('status','show')->where('category_id', $request->category_id)->latest()->get();

        $data = view('frontend_pages.resources.onSaleCategory', compact('items'))->render();

        return response()->json(['data'=> $data]);
    }

    public function LowToHighCollection(Request $request){
        $items = Item::where('status','show')->where('category_id', $request->category_id)->orderBy('price','ASC')->get();
        $data = view('frontend_pages.resources.onSaleCategory', compact('items'))->render();

        return response()->json(['data'=> $data]);
    }

    public function HighToLowCollection(Request $request){
        $items = Item::where('status','show')->where('category_id', $request->category_id)->orderBy('price','DESC')->get();
        $data = view('frontend_pages.resources.onSaleCategory', compact('items'))->render();

        return response()->json(['data'=> $data]);
    }

    public function create(){
        return view('frontend_pages.create');
    }

    public function help_center(){
        return view('frontend_pages.resources.help_center',[
            'helpCenters' => HelpCenter::all(),
            'faqs' => FAQ::all(),
        ]);
    }

    public function platform_status(){
        return view('frontend_pages.resources.platform_status', ['platforms' => PlatformTitles::first()]);
    }

    public function partners(){
        return view('frontend_pages.resources.partners', [
            'partnerTopSection' => PartnerTopSection::first(),
            'partnerTitles'     => PartnerTitles::first(),
            'partnerServices'   => PartnerService::all(),
            'signUpData'        => PartnerSignUp::first(),
            'partnerReviews'    => PartnerReview::all(),
            'partnerImages'     => PartnerBrandImage::all(),
            'faqs'              => FAQ::all(),
        ]);
    }

    public function blog(){
        return view('frontend_pages.resources.blog', [
            'blogs' => Blog::orderBy('created_at', 'desc')->take(3)->get(),
        ]);
    }

    public function BlogsLoadMore(Request $request){
      $blogs = Blog::orderBy('created_at', 'desc')->skip($request->count)->take(3)->get();

      $view = view('frontend_pages.resources.blog_load_more',compact('blogs'));

      $data = $view->render();
      $count = $request->count + 3;
      $blog_count = $blogs->count();

      return response()->json(['data'=>$data, 'count'=> $count,'blog_count'=>$blog_count]);
    }

    public function single_post($slug){
        $singleBlog   = Blog::where('slug', $slug)->first();
        $cat_id       = Blog::find($singleBlog->id)->category_id;
        $recent_blogs = Blog::where('category_id', '!=', $cat_id)->latest()->limit(2)->get();
        return view('frontend_pages.resources.single_post', compact('singleBlog', 'recent_blogs'));
    }

    public function newsletter(){
        $newsletter = Newsletter::first();
        return view('frontend_pages.resources.newsletter', compact('newsletter'));
    }

    public function item_details($slug){
        $single_item   = Item::where('slug' , $slug)->first();
        $related_items = Item::where('status','show')->where('category_id' , $single_item->category_id)->where('id','!=',$single_item->id)->get();

        $max_bid = PlaceBid::where('item_id', $single_item->id)->orderBy('bid_amount','DESC')->first();

        $latest_bid = PlaceBid::where('item_id',$single_item->id)->latest('id')->first();

        return view('frontend_pages.pages.item_details',compact('single_item','related_items','max_bid','latest_bid'));
    }

    public function explore_collections(){
        return view('frontend_pages.pages.explore_collections',[
            'all_items' => Item::where('status','show')->latest()->get(),
        ]);
    }

    public function collection($id){
        $items = Item::where('status','show')->where('category_id',$id)->get();
        return view('frontend_pages.pages.collection',[
            'items' => $items,
            'nftcategory' => NFTCategory::find($id),
        ]);
    }

    public function activity(){
        return view('frontend_pages.pages.activity');
    }

    public function rankings(){
        return view('frontend_pages.pages.rankings');
    }

    public function user($id){
        return view('frontend_pages.pages.user',[
            'user' => User::find($id),
            'user_items' => Item::where('status','show')->where('creator_id', $id)->get(),
        ]);
    }
    public function user_search_all_item($user_id){
        $user_items = Item::where('status','show')->where('creator_id', $user_id)->get();
        if($user_items){
            return view('frontend_pages.pages.user',[
                'user' => User::find($user_id),
                'user_items' => $user_items,
            ]);
        }else{
            return back();
        }
    }

    public function filterCategoryByRange(Request $request){
        $user_items = Item::where('status','show')->where('creator_id', $request->user_id)->where('category_id', $request->category_id)->whereBetween('price',[$request->min_amount, $request->max_amount])->get();
        $data = view('frontend_pages.resources.filterByUser', compact('user_items'))->render();
        return response()->json(['data' => $data]);
    }

    public function filterByCategoriesInUser(Request $request){
        $user_items = Item::where('status','show')->where('category_id',$request->cat_id)->where('creator_id', $request->user_id)->get();
        $view =  view('frontend_pages.resources.filterByUser',[
            'user_items' => $user_items,
        ]);

        $data = $view->render();
        return response()->json(['data' => $data]);
    }

    public function filterByCategoriesInCollection(Request $request){
        $items = Item::where('status','show')->where('category_id', $request->cat_id)->get();
        $data = view('frontend_pages.resources.onSaleCategory', compact('items'))->render();
        // $nftcategory = NFTCategory::find($request->cat_id);
        return response()->json(['data' => $data]);
    }

    public function search_price_by_user(Request $request){
        $request->validate([
            'min_amount' => 'required',
            'max_amount' => 'required'
        ]);
        $user_items = Item::where('status','show')->where('creator_id', $request->user_id)->whereBetween('price',[$request->min_amount, $request->max_amount])->get();
        if($user_items){
            return view('frontend_pages.pages.user',[
                'user'       => User::find($request->user_id),
                'user_items' => $user_items,
            ]);
        }else{
            return back();
        }
    }

    public function filterByPriceRangeInCollection(Request $request){
        $request->validate(['min_amount' => 'required','max_amount' =>'required']);
        $items = Item::where('status','show')->where('category_id', $request->category_id)->whereBetween('price',[$request->min_amount, $request->max_amount])->get();
        $data = view('frontend_pages.resources.onSaleCategory', compact('items'))->render();

        return response()->json(['data' => $data]);
    }

    public function edit_profile($slug){
        return view('frontend_pages.pages.edit_profile',[
           'user_info' => User::where('slug', $slug)->first(),
        ]);
    }

    public function update_user_profile(Request $request, $user_id){
        $request->validate([
            'name'           => 'required',
            'username'       => 'required',
            'bio'            => 'required',
            'email'          => 'required',
            'wallet_address' => 'required',
        ]);

        $user = User::find($user_id);
        $user->update([
            'name'           => $request->name,
            'username'       => $request->username,
            'bio'            => $request->bio,
            'email'          => $request->email,
            'twitter_link'   => $request->twitter_link,
            'instagram_link' => $request->instagram_link,
            'youtube_link'   => $request->youtube_link,
            'wallet_address' => $request->wallet_address,
        ]);

        $location = public_path('uploads/images/users');

        if($request->hasFile('profile_photo_path')){
            $profile_photo = $request->file('profile_photo_path');
            $profilerPhotoName = uniqid() . "." .$profile_photo->extension();
            $profile_photo->move($location, $profilerPhotoName);
            $user->profile_photo_path = $profilerPhotoName;
        }
        if($request->hasFile('cover_photo_path')){
            $cover_photo = $request->file('cover_photo_path');
            $coverrPhotoName = uniqid() . "." .$cover_photo->extension();
            $cover_photo->move($location, $coverrPhotoName);
            $user->cover_photo_path = $coverrPhotoName;
        }

        $user->save();

        return back()->withSuccess('User Updated Successfully');
    }

    public function about(){
        return view('frontend_pages.pages.about', [
            'aboutHeader'  => AboutHeader::first(),
            'countInfo'    => AboutCount::first(),
            'teamBanner'   => TeamBanner::first(),
            'teams'        => Team::take(5)->get(),
            'partnerBrand' => PartnerBrandImage::all(),
            'blogs'        => Blog::take(3)->get(),
        ]);
    }

    public function contact(){
        return view('frontend_pages.pages.contact', [
            'contactUsTitles' => ContactTitles::first(),
            'contactAddress'  => ContactAddress::first(),
        ]);
    }

    public function wallet(){
        $bannerData     = WalletBanner::first();
        $walletServices = WalletServices::all();
        return view('frontend_pages.pages.wallet', compact('bannerData', 'walletServices'));
    }

    public function terms_of_services(){
        return view('frontend_pages.pages.terms_of_services',[
            'termservices' => TermService::all(),
        ]);
    }

    public function guestUserMessage(Request $request){
        if(Auth::user()){
            $request->validate(['message' => 'required']);
            GuestUserMessage::create([
                'name'       =>Auth::user()->name,
                'email'      =>Auth::user()->email,
                'message'    =>$request->message,
                'created_at' => Carbon::now(),
                ]);
            return response()->json(['success' => "Thanks For Message us !"]);
        }else{
            $request->validate([
                'name'    => 'required',
                'email'   => 'required',
                'message' => 'required',
            ]);
            GuestUserMessage::create($request->except('_token') + ['created_at' => Carbon::now()]);
            return response()->json(['success' => "Thanks For Message us !"]);
        }

    }

    public function cat_wise_item($cat_id){
        $items = Item::where('status','show')->where('category_id',$cat_id)->get();
        return view('frontend_pages.home', [
            'homeTitle'     => HomeTitle::first(),
            'nftModules'    => NftModule::all(),
            'banner'        => Banner::first(),
            'newsletter'    => Newsletter::first(),
            'latest_items'  => Item::where('status','show')->latest()->limit(6)->get(),
            'all_items'     => Item::where('status','show')->latest()->get(),
            'items'         => $items,
        ]);
    }

    public function filterByCategory(Request $request){
        $items = Item::where('status','show')->where('category_id',$request->cat_id)->get();
        $view  = view('frontend_pages.resources.filterByCategory',['items' => $items]);
        $data  = $view->render();
        return response()->json(['data' => $data]);
    }

    public function cat_wise_item_search($cat_id){
        $items = Item::where('status','show')->where('category_id', $cat_id)->get();
        return view('frontend_pages.pages.explore_collections', [
            'all_items' => $items,
        ]);
    }

    public function cat_search_item($cat_id){
        $items = Item::where('status','show')->where('category_id',$cat_id)->get();
        return view('frontend_pages.pages.collection',[
            'items'       => $items,
            'nftcategory' => NFTCategory::find($cat_id),
        ]);
    }

    public function search_by_price(Request $request){
        $items = Item::where('status','show')->whereBetween('price',[$request->min_amount, $request->max_amount])->where('category_id', $request->cat_id)->get();
        return view('frontend_pages.pages.collection',[
            'items'       => $items,
            'nftcategory' => NFTCategory::find($request->cat_id),
        ]);
    }

    public function refresh_metadata(){
        return response()->json([
            'message' => "We've queued this item for an update! Check back in a minute...",
        ]);
    }

    public function platformTitles(){
        return view('admin.platform.index', ['platforms'=> PlatformTitles::first()]);
    }

    public function updatePlatformTitles(Request $request, $id){
        $request->validate([
            'title'           => 'required',
            'operation_title' => 'required',
            'history_title'   => 'required'
        ]);
        $updatableData = PlatformTitles::find($id);
        $updatableData->update($request->except('_token') + ['updated_at' => Carbon::now()]);
        if($request->hasFile('image')){
            $image    = $request->file('image');
            $fileName = uniqid() . "flatform." . $image->extension();
            $image->move(public_path('uploads/images/platfrom'), $fileName);
            $updatableData->image = $fileName;
            $updatableData->save();
        }
        return back()->withSuccess('Data updated Success !');
    }

    public function showSubscriber(){
        return view('admin.subscribers.index', ['subscribers' => Subscribe::all()]);
    }

    public function destroySubscriber($id){
        $deleteSubscriber = Subscribe::find($id);
        $deleteSubscriber->delete();
        return back()->withErrors('Subscriber Delete Success !');
    }

    public function faqSearch(Request $request){
        $search_value = $request->search_value;
        $faqs  = FAQ::where('question','LIKE','%'.$search_value.'%')->get();
        $view  = view('frontend_pages.resources.faqSearch', compact('faqs'))->render();
        return response()->json(['searchData' => $view]);
    }

    public function loginPageResources(){
        return view('admin.loginPage.index', ['loginPage' => LoginSignUpPage::first()]);
    }

    public function loginPageResourcesUpdate(Request $request, $id){
        $request->validate([
            'login_title'=> 'required'
        ]);
        $updatableData = LoginSignUpPage::find($id);
        $updatableData->update($request->except('_token') + ['updated_at' => Carbon::now()]);
        $location      = public_path('uploads/login');

        if($request->hasFile('logo')){
            $logo       = $request->file('logo');
            $fileName   = uniqid() . "logo." . $logo->extension();
            $logo->move($location, $fileName);
            $updatableData->logo = $fileName;
        }
        if($request->hasFile('banner_image')){
            $banner_image = $request->file('banner_image');
            $fileName     = uniqid() . "banner_image." . $banner_image->extension();
            $banner_image->move($location, $fileName);
            $updatableData->banner_image = $fileName;
        }
        $updatableData->save();
        return back()->withSuccess("Data updated Success !");
    }

    public function passwordReset(){
        return view('admin.loginPage.forgetPassword');
    }

}
