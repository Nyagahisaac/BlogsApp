<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Posts;


class Comments extends Component
{
    public $posts, $comments, $post_id, $user_id, $updateComment = false, $addComment = false;

    public $all_comment_count;
    public $replyingTo;


    protected $rules = [
        'comments' => 'string|required|min:3|max::5000',
        'post_id' => 'int|required',
        'user_id' => 'int|required'
    ];


    public function mount($post_id)
    {
        $this->post_id = $post_id;
    }

    public function addComment()
    {
        $this->validate([
            'comment' => 'required'
        ]);

        Comment::create([
            'post_id' => $this->post_id,
            'comments' => $this->comments
        ]);

        $this->comments = '';
        $this->emit('commentAdded');
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
