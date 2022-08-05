<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemProblem;
use App\Models\Like;
use App\Models\User;
use App\Models\LikeUser;
use App\Models\PlaceBid;
use App\Models\NFTCategory;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\LikeCollection;
use App\Models\ReportCategory;
use App\Models\ReportUser;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function notification_seen(Request $request)
    {
        Notification::find($request->notify_id)->update([
            'status' => 'seen'
        ]);
        return response()->json([
            'notify_id' => $request->notify_id,
        ]);
    }

    public function mark_all_notify($id)
    {
        $all_notifications = Notification::where('notify_to', $id)->get();
        foreach($all_notifications as $not){
            $not->update([
                'status' => 'seen',
            ]);
        }
        return back()->with('Your All Notifications Marked as Read');
    }

    public function view_all_notify($id)
    {
        $all_notifications = Notification::where('notify_to',$id)->get();
        return view('admin.notify.index',compact('all_notifications'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function multi_notify_delete(Request $request)
    {
        // return $request->check;
        foreach ($request->check as $id) {
            Notification::find($id)->delete();
        }
        return back();
    }

    public function notify_destroy(Request $request, $id)
    {
        return $request->check();
        Notification::find($id)->delete();
        return back()->with('danger','Notification Deleted');
    }

    public function notificationView($id){

        // dd('hi');
        $notify = Notification::find($id);


        if($notify->type == 'Like'){
            $like = Like::find($notify->type_id);
            return redirect()->route('item_details', Item::find($like->item_id)->slug);
        }

        if($notify->type == 'Item'){
            $item = Item::find($notify->type_id);
            return redirect()->route('item.index');
        }

        if($notify->type == 'LikeUser'){
            $user = LikeUser::find($notify->type_id);
            return redirect()->route('user', $user->creator_id);
        }

        if($notify->type == 'LikeCollection'){
            $collection = LikeCollection::find($notify->type_id);
            return redirect()->route('cat_search_item', $collection->collection_id);
        }

        if($notify->type == 'PlaceBid'){
            $bids = PlaceBid::find($notify->type_id);
            return redirect()->route('item_details', Item::find($bids->item_id)->slug);
        }

        if($notify->type == 'ReportUser'){
            $reportuser = ReportUser::find($notify->type_id);
            return redirect()->route('user', $reportuser->report_to);
        }

        if($notify->type == 'ReportCategory'){
            $reportcat = ReportCategory::find($notify->type_id);
            return redirect()->route('cat_search_item', $reportcat->category_id);
        }

        if($notify->type == 'ItemProblem'){
            $itemproblem = ItemProblem::find($notify->type_id);
            return redirect()->route('item_details', Item::find($itemproblem->item_id)->slug);
        }

    }
}
