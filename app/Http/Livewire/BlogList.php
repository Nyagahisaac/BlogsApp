<?php

namespace App\Http\Livewire;

use App\Models\Posts;
use Livewire\Component;

class BlogList extends Component
{
    public $search;
    public $posts = [];

    public function render()
    {
        $this->refreshBlogs();
        return view('livewire.blog-list');
    }

    public function refreshBlogs()
    {
        $query = Posts::query();

        if(!empty($search)){
            $query = $query->where('title', 'like', '%'.$search.'%');
        }
        $this->posts = $query->get();

    }
}
