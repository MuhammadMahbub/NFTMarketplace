<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Item;
use App\Models\Like;
use App\Models\User;
use App\Models\LikeUser;
use App\Models\PlaceBid;
use App\Models\ReportUser;
use App\Models\ItemProblem;
use App\Models\NFTCategory;
use Illuminate\Support\Str;
use App\Models\Notification;
use App\Models\ThemeSetting;
use Illuminate\Http\Request;
use App\Models\LikeCollection;
use App\Models\ReportCategory;
use App\Models\Subscribe;
use Illuminate\Validation\Rule;
use Shetabit\Visitor\Models\Visit;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index(){

        $total = Visit::whereIn('browser', ['IE', 'Firefox', 'Chrome', 'Safari', 'Opera'])->whereDate('created_at', '>', Carbon::now()->subDays(28))->get();
        $today_page_views = Visit::whereDate('created_at', '=', Carbon::today())->count();
        $unique_users = User::count();

        $top_pages = Visit::select('url')
            ->selectRaw('COUNT(*) AS count')
            ->groupBy('url')
            ->orderByDesc('count')
            ->limit(10)
            ->get();

        $total_items = [];

        for ($i=1; $i <=12 ; $i++) {
            $total_items []  = Item::whereYear('created_at',date('Y'))->whereMonth('created_at',$i)->count();
            $bid_items []  = PlaceBid::whereYear('created_at',date('Y'))->whereMonth('created_at',$i)->count();
            $reported_items []  = ItemProblem::whereYear('created_at',date('Y'))->whereMonth('created_at',$i)->count();
            $liked_items []  = Like::whereYear('created_at',date('Y'))->whereMonth('created_at',$i)->count();
            $monthly_users [] = User::whereYear('created_at',date('Y'))->whereMonth('created_at',$i)->count();
        }


        $total_users = User::count();
        $today_likes = Like::whereDate('created_at', Carbon::today())->count();
        $total_report = ItemProblem::count();
        $total_bid = PlaceBid::count();
        $total_users = User::count();

        return view('admin.index',compact('today_page_views', 'unique_users', 'top_pages', 'total_items', 'bid_items', 'reported_items', 'liked_items','total_users', 'monthly_users', 'today_likes', 'total_report', 'total_users', 'total_bid'));
}

    // User List
    public function userList(){
        $users = User::orderBy('name', 'asc')->get();
        return view('admin.users.index', compact('users'));
    }

    public function userShow($id){
        $user = User::find($id);
        return view('admin.users.show',compact('user'));
    }

    // User Create
    public function userCreate(){
        return view('admin.users.create');
    }

    // User Store
    public function userStore(Request $request){
// return $request;
        $request->validate(['name' => 'required', 'email' => 'required|unique:users', 'password' => 'required', 'password_confirmation' => 'required_with:password|same:password']);
        // $slug = Str::slug($request->name);
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'slug' => 'asasas',
            'created_at' => Carbon::now()
        ]);
        ThemeSetting::create(['user_id' => $user->id, 'created_at' => Carbon::now()]);

        // $hashWallet = Hash::make($request->wallet_address);
        // $hashPassword = Hash::make($request->password);
        // $user->wallet_address = $hashWallet;
        // $user->password = $hashPassword;
        // $user->save();

        // if($request->hasFile('profile_photo_path')){
        //     $image = $request->file('profile_photo_path');
        //     $fileName = uniqid() . 'profile.' . $image->extension();
        //     $location = public_path('uploads/images/users');
        //     $image->move($location, $fileName);
        //     $user->profile_photo_path = $fileName;
        //     $user->save();
        // }
        // if($request->hasFile('cover_photo_path')){
        //     $image = $request->file('cover_photo_path');
        //     $fileName = uniqid() . 'cover.' . $image->extension();
        //     $location = public_path('uploads/images/users');
        //     $image->move($location, $fileName);
        //     $user->cover_photo_path = $fileName;
        //     $user->save();
        // }
        return redirect()->route('login')->with('success', 'User Created Successfully !');
    }

    public function userRoleEdit($id){
        return view('admin.users.role_edit', ['user' => User::where('id', $id)->first()]);
    }
    public function userEdit($id){
        return view('admin.users.edit', ['user' => User::where('id', $id)->first()]);
    }

    // User Update
    public function userUpdate(Request $request, $id){

        $user = User::find($id);

        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'wallet_address' => 'required',
        ]);

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'wallet_address' => $request->wallet_address,
            'updated_at' => Carbon::now()
        ]);
        if($request->hasFile('cover_photo_path')){
            $image = $request->file('cover_photo_path');
            $fileName = uniqid() . 'cover.' . $image->extension();
            $location = public_path('uploads/images/users');
            $image->move($location, $fileName);
            $user->cover_photo_path = $fileName;
            $user->save();
        }
        if($request->hasFile('profile_photo_path')){
            $image = $request->file('profile_photo_path');
            $fileName = uniqid() . 'profile.' . $image->extension();
            $location = public_path('uploads/images/users');
            $image->move($location, $fileName);
            $user->profile_photo_path = $fileName;
            $user->save();
        }

        return redirect()->route('users.index')->with('success', 'User Updated Successfully !');
    }

    // User Role Update
    public function update_user_role(Request $request, $id){

        $user = User::find($id);

        $request->validate([
            'role_id' => 'required',
        ]);

        $user->update([
            'role_id' => $request->role_id,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('users.index')->with('success', 'User Updated Successfully !');
    }

    public function profile_edit($slug){
        return view('admin.users.profile_edit',[
           'user' => User::where('slug', $slug)->first(),
        ]);
    }

    public function update_password(Request $request, $id){
        $request->validate([
            'current_password' => 'required'
        ]);
        $user = User::find($id);
        $hashPass = Hash::check($request->current_password, $user->password);
        if($hashPass){
            $request->validate([
                'password' => 'required',
                'password_confirmation' => 'required'
            ]);
            if($request->password == $request->password_confirmation){
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            }else{
                return back()->withErrors("Password doesn't match");
            }
        }else{
            return back()->withErrors("Password doesn't match with our database credentials");
        }

    }
     // User Delete
    public function userDestroy($id){

        $like_user = Like::where('user_id',$id)->get();
        foreach($like_user as $user){
            $user->update([
                'user_id' => NULL,
            ]);
        }
        $notify_user = Notification::where('user_id',$id)->get();
        foreach($notify_user as $user){
            $user->update([
                'user_id' => NULL,
            ]);
        }
        $notify_users = Notification::where('message_to',$id)->get();
        foreach($notify_users as $user){
            $user->update([
                'user_id' => NULL,
            ]);
        }

        $like_users = LikeUser::where('user_id',$id)->get();
        foreach($like_users as $user){
            $user->update([
                'user_id' => NULL,
            ]);
        }

        $like_creator = LikeUser::where('creator_id',$id)->get();
        foreach($like_creator as $user){
            $user->update([
                'creator_id' => NULL,
            ]);
        }
        $like_coll = LikeCollection::where('user_id',$id)->get();
        foreach($like_coll as $col){
            $col->update([
                'user_id' => NULL,
            ]);
        }
        $place_user = PlaceBid::where('user_id',$id)->get();
        foreach($place_user as $user){
            $user->update([
                'user_id' => NULL,
            ]);
        }
        $items = Item::where('creator_id',$id)->get();
        foreach($items as $item){
            $item->delete();
        }
        $problems = ItemProblem::where('user_id',$id)->get();
        foreach($problems as $user){
            $user->update([
                'user_id' => NULL,
            ]);
        }
        $report_user = ReportUser::where('report_by',$id)->get();
        foreach($report_user as $user){
            $user->update([
                'report_by' => NULL,
            ]);
        }
        $report_users = ReportUser::where('report_to',$id)->get();
        foreach($report_users as $user){
            $user->update([
                'report_to' => NULL,
            ]);
        }
        $report_cat = ReportCategory::where('report_by',$id)->get();
        foreach($report_cat as $cat){
            $cat->update([
                'report_by' => NULL,
            ]);
        }
        
        $subs = Subscribe::where('email', User::find($id)->email)->first();
        $subs->delete();

        User::find($id)->delete();
        return back()->withDanger('User deleted');
    }

}
