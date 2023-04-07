<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $comment = Comment::where('user_id', Auth::user()->id)->latest()->paginate(1);

        return $this->markdown('emails.comment-notification',['comments'=>$comment])
                 ->subject('New comment on your post');
    }

    
}
