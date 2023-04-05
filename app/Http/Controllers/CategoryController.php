<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('/category',['categories' => $category]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = new Category();
        return view('/newCategory', compact('categories'));
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
            'name' => 'required',
        ]);

        // Create categories
        $categories = new category;
        $categories->name = $request->name;
        // $categories->user_id = auth()->user()->id;
        $categories->post_id = $request->post_id;
        $categories->save();

        return redirect(route('categories'))->with('status', 'categories Created Successfully 😊');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = category::find($id);
        return view('category')->with('categories', $categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::find($id);
        
        //Check if categories exists before deleting
        if (!isset($categories->id)) {
            return redirect(route('categoriess'))->with('error', 'No categories Found');
        }
        
        // Check for correct user
        if (auth()->user()->id !== intval($categories->user_id)) {
            return response()->json($categories);
            return redirect(route('categoriess'))->with('error', 'Unauthorized Page');
        }
        // return response()->json('here');
        return view('', compact('categories'))->with('categoriess', $categories);
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
            'categories' => 'required'
        ]);
        $categories = Category::find($id);
        $categories->name = $request->name;
        $categories->post_id =  $request -> post_id;
    
        $categories->save();


        return redirect(route('categories'))->with('status', 'categories Updated 😊' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::find($id);

        //Check if post exists before deleting
        if (!isset($categories->id)) {
            return redirect(route('categories'))->with('status', 'No Category Found');
        }

        // // Check for correct user
        // if (auth()->user()->id !== intval($categories->user_id)) {
        //     return redirect(route('categories'))->with('status', 'Unauthorized Page');
        // }

       

        $categories->delete();
        return redirect()->back()->with('status', 'Category Removed');
    }
}
