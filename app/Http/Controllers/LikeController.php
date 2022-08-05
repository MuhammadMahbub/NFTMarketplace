<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Like;
use App\Models\User;
use App\Models\LikeUser;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\LikeCollection;
use App\Models\NFTCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LikeController extends Controller
{

    public function like_item(Request $request){

       $like_exist = Like::where('user_id', Auth::id())->where('item_id',$request->item_id)->first();

        if($like_exist){
            $delete_notify = Notification::where('type_id',$like_exist->id)->get();
            foreach($delete_notify as $not){
                $not->delete();
            }

            $like_exist->delete();
            $count = Like::where('item_id', $request->item_id)->count();
            return response()->json([
                'message' => "You DisLike the Collection",
                'count' => $count,
                'item_id' => $request->item_id,
            ]);
        }else{
            $like_id = Like::create([
                'user_id' => Auth::id(),
                'item_id' => $request->item_id,
                'like_count' => 1,
                'created_at' => Carbon::now(),
            ]);

            $admins = User::where('role_id', 1)->get();
            foreach($admins as $admin){
                Notification::create([
                    'user_id' => Auth::id(),
                    'type' => 'Like',
                    'type_id' => $like_id->id,
                    'notify_to' => $admin->id,
                    'message' => Auth::user()->name.' Likes Your ' .Item::find($request->item_id)->name. ' Item',
                    'created_at' => Carbon::now(),
                ]);
            }

            $exist = Notification::where('user_id', Auth::id())->where('type', 'Like')->where('notify_to', Item::find($request->item_id)->creator_id)->first();
            if(!$exist){
                Notification::create([
                    'user_id' => Auth::id(),
                    'type' => 'Like',
                    'type_id' => $like_id->id,
                    'notify_to' => Item::find($request->item_id)->creator_id,
                    'message' => Auth::user()->name.' Likes Your ' .Item::find($request->item_id)->name. ' Item',
                    'created_at' => Carbon::now(),
                ]);
            }

            $count = Like::where('item_id', $request->item_id)->count();
            return response()->json([
                'status' => 200,
                'message' => "You Like the Item",
                'count' => $count,
                'item_id' => $request->item_id,
            ]);

        }
    }

    public function like_collection(Request $request){

       $like_exist = LikeCollection::where('user_id', Auth::id())->where('collection_id',$request->cat_id)->first();

        if($like_exist){
            $delete_notify = Notification::where('type_id',$like_exist->id)->get();
            foreach($delete_notify as $not){
                $not->delete();
            }

            $like_exist->delete();
            $count = LikeCollection::where('collection_id', $request->cat_id)->count();
            return response()->json([
                'message' => "You DisLike the Item",
                'count' => $count,
                'collection_id' => $request->cat_id,
            ]);
        }else{
            $like_coll = LikeCollection::create([
                'user_id' => Auth::id(),
                'collection_id' => $request->cat_id,
                'like_count' => 1,
            ]);


            $admins = User::where('role_id', 1)->get();
            foreach($admins as $admin){
                Notification::create([
                    'user_id' => Auth::id(),
                    'type' => 'LikeCollection',
                    'type_id' => $like_coll->id,
                    'notify_to' => $admin->id,
                    'message' => Auth::user()->name.' Likes '.NFTCategory::find($request->cat_id)->name.' Category',
                    'created_at' => Carbon::now(),
                ]);
            }

            $count = LikeCollection::where('collection_id', $request->cat_id)->count();
            return response()->json([
                'status' => 200,
                'message' => "You Like the Category",
                'count' => $count,
                'collection_id' => $request->cat_id,
            ]);
        }
    }

    public function like_user(Request $request){
        // dd($request->creator_id);
        $like_exist = LikeUser::where('user_id', Auth::id())->where('creator_id', $request->creator_id)->first();

        if($like_exist){
        $delete_notify = Notification::where('type_id',$like_exist->id)->get();
        foreach($delete_notify as $not){
            $not->delete();
        }

        $like_exist->delete();
        $count = LikeUser::where('creator_id', $request->creator_id)->count();
        return response()->json([
            'message' => 'You DisLike the User',
            'count' => $count,
            'creator_id' => $request->creator_id,
        ]);
        }else{
            $like_user = LikeUser::create([
                'user_id' => Auth::id(),
                'creator_id' => $request->creator_id,
                'like_count' => 1,
            ]);

        $admins = User::where('role_id', 1)->get();
        foreach($admins as $admin){
            Notification::create([
                'user_id' => Auth::id(),
                'type' => 'LikeUser',
                'type_id' => $like_user->id,
                'notify_to' => $admin->id,
                'message' => Auth::user()->name.' Likes '.User::find($request->creator_id)->name,
                'created_at' => Carbon::now(),
            ]);
        }

        $exist = Notification::where('user_id', Auth::id())->where('type', 'LikeUser')->where('notify_to', $request->creator_id)->first();
        if(!$exist){
            Notification::create([
                'user_id' => Auth::id(),
                'type' => 'LikeUser',
                'type_id' => $like_user->id,
                'notify_to' => $request->creator_id,
                'message' => Auth::user()->name.' Likes '.User::find($request->creator_id)->name,
                'created_at' => Carbon::now(),
            ]);
        }

            $count = LikeUser::where('creator_id', $request->creator_id)->count();
            return response()->json([
                'status' => 200,
                'message' => "You Like the User",
                'count' => $count,
                'creator_id' => $request->creator_id,
            ]);
        }
    }


    public function liked_items(){
        return view('admin.ItemReport.liked_items', ['likes' => Like::latest()->get()]);
    }

    public function like_item_destroy($id)
    {
        $delete_notify = Notification::where('type_id',$id)->get();
        foreach($delete_notify as $not){
            $not->delete();
        }

        Like::find($id)->delete();
        return back()->withDanger('Report Deleted Success !');
    }

}
