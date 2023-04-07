<div>
    <h1>blogs</h1>
    <div class="input-group w-25">

    </div>
        
    <div class="blog-list">
    <input wire:model="search" type="text" id="textSearch" class="w-full rounded border shadow p-2 mr-2 my-2" placeholder="search blogs.....">

    @foreach($posts as $post)
    <div class="rounded border shadow p-3 my-2">
        <div class="flex justify-between my-2">
            <div class="flex">
                <p class="font-bold text-lg">{{$post->title}}</p>
                <p class="mx-3 py-1 text-xs text-gray-500 font-semibold">{{$post->created_at->diffForHumans()}}
                </p>
            </div>

        </div>
        <p class="text-gray-800">{{$post->posts}}</p>

    </div>
    @endforeach
    </div>
</div>