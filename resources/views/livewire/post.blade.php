@extends('layouts.base')

@section('title')
@livewireStyles
@endsection

@section('content')

<style>
    .card {
        border: 2px solid #eee;
    }

    .rey-btn {
        border: 1px solid #070707;
        padding: 10px 30px;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 13px;
        font-weight: 500;
        border-radius: 50px;
        transition: all 0.3s;
    }
    textarea {
        border: 1px solid #070707;
        padding: 10px 30px;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 13px;
        font-weight: 500;
        border-radius: 50px;
        transition: all 0.3s;
    }
</style>
<main class=" container my-5">
    <div class="content text-center">
        @if(session('status'))
        <div class="alert alert-success text-white" id="error_message">
            {{ session('status') }}
        </div>
        @endif
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
        @endif
        @if(session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session()->get('error') }}
        </div>
        @endif
    </div>
    <!--  --> <a href="/" class="btn btn-default">Go Back</a>

    <div class="row">
        <div class="container">

            <div class="container  text-dark">

                <div class="row d-flex justify-content-center">
                    <div class="col-md-12 ">

                        <section>

                            <div class="col-md-12 col-lg-12 col-xl-11 ">

                                <div class=" row d-flex justify-content-center">


                                    <div class=" col-md-6 ">
                                        <div class="content p-2  text-center">
                                            <div>
                                                <h3 class="mb-4">Blog Posts</h3>

                                            </div>
                                        </div>
                                        <p class="mb-4 pb-2 mb-md-5 pb-md-0 text-center ">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet
                                            numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum
                                            quisquam eum porro a pariatur veniam.
                                        </p>
                                    </div>
                                    <div class="links col-md-6 text-center">
                                        <a href="{{ route('posts.create') }}" class="btn rey-btn btn-outline-dark">Create Blog</a>
                                    </div>
                                </div>
                        </section>
                    </div>
                </div>


                <div class="row text-center ">


                    @foreach ($posts as $index => $post)

                    @if(!Auth::guest())
                    @if(Auth::user()->id == $post->user_id)
                    <div class="col-md-4  mb-5 mb-md-4 mt-5">
                        <div class="card testimonial-card p-3">

                            <div class="card-up" style="background-color: #9d789b;"></div>
                            <img src="{{$post->image}}" style="width:100%;height:30vh;">
                            <h3 class="mt-3">{{$post->title}} </h3>
                            <!-- <div class="development-image">
                                    <a class="btn btn-outline-default" id="image2">Read more .... 😊</a>

                                </div> -->
                            <br><br>
                            <div class="text-center mt-2">
                                {!!$post->post!!}
                            </div>
                          
                            <hr>
                            <small>Written on {{$post->created_at->format('dS M Y')}} by <strong>{{Auth::user()->name}}</strong> </small>
                            <hr>

                            <div class="" style="display:flex;justify-content:space-between;">


                                <a href="/edit/{{$post->id}}" class="btn btn-default">Edit</a>


                                @method('DELETE')
                                <a href="{{route('posts.delete',['id'=>$post->id])}}" class="btn btn-outline-danger">Delete</a>
                            </div>
                            <div class="comments">

                            </div>
                            <div class="mt-2 card p-3">

                                <form method="POST"  action="{{ route('comments.store', $post->id) }}" >
                                    @csrf
                                    <div class="form-group ">
                                        <input type="hidden" value="{{ $post->id }}" name="post_id">

                                        <textarea name="comments" id="comments" class="form-control " row="1" placeholder="add comment ......">{{ old('body') }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Comment</button>
                                </form>
                                </div>
                                <div class="development-image">
                                    <a class="btn btn-outline-default" id="image2">Comments 😊</a>

                                </div>

                            <div id="developmen" class="mt-3">

                                <div class="p">
                                    @foreach($comments as $comment)

                                    @if(Auth::user()->id == $comment->user_id)
                                    @if($post->id == $comment->post_id)

                                    <div class="rounded border shadow p-3 my-2">
                                        <div class="d-flex my-2" style="display:flex; justify-content:space-between;">
                                            <div class="d-">
                                                <h5>{{Auth::user()->name}}</h5>

                                                <p class=" text-xs text-gray-500 font-semibold">{{$comment->created_at->diffForHumans()}}
                                                </p>
                                            </div>
                                            <i class="fas fa-times text-red-200 hover:text-red-600 cursor-pointer" wire:click="remove({{$comment->id}})"></i>
                                        </div>
                                        <p class="text-gray-800 text-center">{{$comment->comments}}</p>

                                    </div>
                                    @endif
                                    @endif

                                    @endforeach

                                </div>


                            </div>
                        </div>
                        {!!Form::close()!!}


                    </div>
                    @endif
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
@livewireScripts
<script>
    $(document).ready(function() {
        setTimeout(() => {
            $('#error_message').remove();
            $('#success_message').remove();
        }, 3000)
    });

    function liked(heart) {
        if (heart.classList.toggle('liked')) click++;
        else click--;

        document.getElementById('clicks').textContent = click;
    }

    $(document).ready(function() {
        $("#image1").click(function() {

            $(".design-image").slideDown('1500').hide('1000');
            $("#design").show('1500');

        });
        $("#image2").click(function() {
            $(".development-image").slideDown('1500').hide('1000');
            $("#development").show('1500');
        });
        $("#image3").click(function() {
            $(".product-image").slideDown('1500').hide('1000');
            $("#product").show('1500');
        });
        $("#design").click(function() {
            $("#design").slideUp();
            $(".design-image").show();
        });
        $("#development").click(function() {
            $("#development").slideUp();
            $(".development-image").show();
        });
        $("#product").click(function() {
            $("#product").slideUp();
            $(".product-image").show();
        });

    });
</script>
@endsection