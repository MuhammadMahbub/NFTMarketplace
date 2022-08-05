<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SubscribeMail;
use Illuminate\Support\Facades\mail;
use App\Models\Subscribe;
use Carbon\Carbon;

class SubscribeController extends Controller
{
    public function user_subscribe(Request $request){
        $request->validate(['email' => 'required|unique:subscribes'],['email.unique' => "You are already subscribed !"]);
        $mail = Subscribe::create($request->except('_token')+['created_at' => Carbon::now()]);

        // if($mail){
        //     $data = "Thanks for subscribe our app !";
        //     Mail::to($request->email)->send(new SubscribeMail($data));
        // }

        return back()->withSuccess('Subscribed !');
    }


    public function all_subscriber(Request $request){
        return view('admin.subscriber.index',[
            'all_subscribers' => Subscribe::latest()->get(),
        ]);
    }

    public function subs_destroy($id){

        Subscribe::find($id)->delete();
        return back()->with('danger','Deleted Successfully');
    }
}
