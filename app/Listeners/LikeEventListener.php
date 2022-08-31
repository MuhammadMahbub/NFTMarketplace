<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\User;
use App\Events\LikeEvent;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LikeEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\LikeEvent  $event
     * @return void
     */
    public function handle(LikeEvent $event)
    {
        $admins = User::where('role_id', 1)->get();
            foreach($admins as $admin){
                Notification::create([
                    'user_id' => Auth::id(),
                    'type' => $event->type,
                    'type_id' => $event->type_id,
                    'notify_to' => $admin->id,
                    'message' => $event->message,
                    'created_at' => Carbon::now(),
                ]);
            }
    }
}
