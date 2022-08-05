<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\User;
use App\Models\PlaceBid;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\PseudoTypes\True_;

class PlaceBidController extends Controller
{

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'bid_amount' => 'required|numeric',
            // 'check' => 'required',
        ],[
           'bid_amount.required'=>'Please Place a Bid !!!',
        ]);

        $price = Item::find($request->item_id)->price;
        $max_bid = PlaceBid::where('item_id', $request->item_id)->max('bid_amount');

        if($request->bid_amount < $price){
            return response()->json([
                'status' => 400,
                'message' => 'Please Select a Bid Greater than Price !'
            ]);
        }else{
            if($request->bid_amount <= $max_bid){
                return response()->json([
                    'status' => 400,
                    'message' => 'Please Select Greater Bid !'
                ]);
            }else{
                $bid = PlaceBid::create([
                    'user_id'    => Auth::id(),
                    'item_id'    => $request->item_id,
                    'bid_amount' => $request->bid_amount,
                    'check'      => true,
                    'created_at' => Carbon::now()
                ]);

                $admins = User::where('role_id', 1)->get();
                foreach($admins as $admin){
                    Notification::create([
                        'user_id' => Auth::id(),
                        'type' => 'PlaceBid',
                        'type_id' => $bid->id,
                        'notify_to' => $admin->id,
                        'message' => 'Bid Placed on '.Item::find($request->item_id)->name.' Item',
                        'created_at' => Carbon::now(),
                    ]);
                };

                $exist = Notification::where('user_id', Auth::id())->where('type', 'PlaceBid')->where('notify_to', Item::find($request->item_id)->creator_id)->first();
                if(!$exist){
                    Notification::create([
                        'user_id' => Auth::id(),
                        'type' => 'PlaceBid',
                        'type_id' => $bid->id,
                        'notify_to' => Item::find($request->item_id)->creator_id,
                        'message' => Auth::id().' Placed bid on '.Item::find($request->item_id)->name.' Item',
                        'created_at' => Carbon::now(),
                    ]);
                };

                return response()->json([
                    'status' => 200,
                    'message' => 'bid Place Success!'
                ]);
            }

            return response()->json([
                'status' => 200,
                'message' => 'Bid Place Success !'
            ]);
        }

    }


    public function bid_items(){
        return view('admin.bid.bid_items', ['bids' => PlaceBid::latest()->get()]);
    }

    public function bid_destroy($id){
        $delete_notify = Notification::where('type_id', $id)->get();
        foreach($delete_notify as $not){
            $not->delete();
        }

        PlaceBid::find($id)->delete();
        return back()->withDanger('Bid Deleted Successfully !');
    }
}




