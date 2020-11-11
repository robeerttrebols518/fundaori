<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Post;
use Carbon\Carbon;

class PostNotification extends Notification
{
    use Queueable;
    public function __construct(Post $post){
        $this->post = $post;
    }

    public function via($notifiable){
        //return ['mail'];
        return ['database'];
    }

    public function toMail($notifiable){
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable){
        return [
            'post'          => $this->post->id,
            'title'         => $this->post->title,
            'description'   => $this->post->description,
            'time'          => Carbon::now()->diffForHumans(),
        ];
    }
}
