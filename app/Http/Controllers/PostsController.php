<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Posts;
use App\Models\Category;
use App\Models\Comment;


class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['post', 'show']]);
    }


   


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Posts::orderBy('created_at', 'desc')->paginate(10);
        $comments = Comment::all();
        return view('livewire.post', ['posts' => $posts], compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Posts();
        $categories = Category::all();
        return view('livewire.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'post' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);

        // Create Post
        $post = new Posts;
        $post->title = $request->title;
        $post->post = $request->post;
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->category_id;
        $post->image = '/storage/' . $request->file('image')->store('images');
        if ($request->file('image') == null) {
            $file = "";
        } else {
            $file = $request->file('image')->store('images');
        }
        $post->save();

        return redirect(route('posts'))->with('status', 'Post Created Successfully 😊');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $post)
    {
        $post = Posts::orderBy('created_at', 'desc')->paginate(10);

        // $post = Posts::find($id);
        return view('livewire.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::find($id);
        $categories = Category::all();


        //Check if post exists before deleting
        if (!isset($post->id)) {
            return redirect(route('posts'))->with('error', 'No Post Found');
        }

        // Check for correct user
        if (auth()->user()->id !== intval($post->user_id)) {
            return response()->json($post);
            return redirect(route('posts'))->with('error', 'Unauthorized Page');
        }
        // return response()->json('here');
        return view('livewire.edit', compact('categories'))->with('posts', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'post' => 'required'
        ]);
        $post = Posts::find($id);

        $post->title = $request->title;
        $post->post = $request->post;
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->category_id;
        $post->image = '/storage/' . $request->file('image')->store('images');
        if ($request->file('image') == null) {
            $file = "";
        } else {
            $file = $request->file('image')->store('images');
        }
        $post->save();


        return redirect(route('posts'))->with('status', 'Post Updated 😊');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::find($id);

        //Check if post exists before deleting
        if (!isset($post->id)) {
            return redirect(route('posts'))->with('status', 'No Post Found');
        }

        // Check for correct user
        if (auth()->user()->id !== intval($post->user_id)) {
            return redirect(route('posts'))->with('status', 'Unauthorized Page');
        }

        if ($post->image != 'noimage.jpg') {
            // Delete Image
            Storage::delete('public/images/' . $post->image);
        }

        $post->delete();
        return redirect()->back()->with('status', 'Post Removed');
    }
}
