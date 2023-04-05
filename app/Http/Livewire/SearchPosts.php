<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Posts;
use App\Models\Category;

class SearchPosts extends Component
{
    use WithPagination;
    public $query;
    public $search = '';
    public $results;

    

 

    public function search(Posts $posts)
    {
        $results = Posts::where('title', 'like', '%' . $this->search . '%')
            ->orWhere('post', 'like', '%' . $this->search . '%')
            ->get();
            return view('livewire.search-posts', [
                'results' => $results, $posts
            ]);
    }

    public function render()
    {
        $posts = Posts::query()
            ->where('title', 'LIKE', '%' . $this->search . '%')
            ->orWhere('post', 'LIKE', '%' . $this->search . '%')
            ->get();

        return view('livewire.search-posts', [
            'posts' => $posts,
        ]);
    }
}
