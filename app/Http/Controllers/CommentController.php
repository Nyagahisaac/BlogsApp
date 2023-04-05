<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommentNotification;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment = Comment::where('user_id', Auth::user()->id)->latest()->paginate(10);
        $posts = Posts::find('id');

        return view('livewire.comments',['comments'=>$comment]);

    }

    public function comments($post_id)
    {
        $comments = Comment::with('comments')->findOrFail($post_id);
        return view('livewire.post',['comments.post'=>$comments]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comment = new Comment();
        return view('livewire.comments', compact('posts'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $posts = Posts::find('id');
        $comments = new Comment();
        $comments->comments = $request->comments;
        $comments->user_id = auth()->user()->id;
        $comments->post_id = $request->post_id;
        $comments->save();
        
        $author = auth()->user()->email;
        $data = [
            'post' => $posts,
            'comment' => $comments,
        ];
        Mail::to($author)->send(new CommentNotification($data));
        return back()->with('success', 'Comment added successfully.');
        // return redirect(route('comments'))->with('status', 'Comment Has Been added Successfully 😊');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $Posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $Posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $Posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $Posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $Posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $Posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $Posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $Posts)
    {
        //
    }
}
