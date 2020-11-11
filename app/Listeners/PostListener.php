<?php
namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

use App\Notifications\PostNotification;
use App\User;

class PostListener{
     
    public function __construct()
    {
        //
    }
        
    public function handle($event)
    {
        //User::all()
        User::where('role','1')
            //->except($event->post->user_id)
            ->each(function(User $user) use ($event){
                Notification::send($user, new PostNotification($event->post));
                //Notification::send($users, new InvoicePaid($invoice));
            });
    }
}
