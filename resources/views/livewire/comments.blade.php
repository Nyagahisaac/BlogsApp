@extends('layouts.base')

@section('title')
@endsection
@section('content')

<div class="card h-100" style=" background: #f7f6f6;">
    <div class="col-md-12 ">
        <section>
            <div class="container my-5 py-5 text-dark">
                <a href="/post" class="btn btn-default">Go Back</a>
                <div class="title text-center">
                    <h4 class="title m-b-md">Comments</h4>
                </div>
                <div class="row d-flex justify-content-center">

                    <div class="text-center">


                        <!-- <form class="my-4 flex">
                            <div>
                                <form wire:submit.prevent="addComment">
                                    <textarea wire:model.defer="comment"></textarea>
                                    <button type="submit">Add Comment</button>
                                </form>
                            </div>


                            <input type="hidden" value="{{ $comments }}" name="post_id" wire:model="post_id">

                            <input type="text" id="comments" class="w-full rounded border shadow p-2 mr-2 my-2 @error('title') is-invalid @enderror" placeholder="Add comment ....." wire:model="comments">
                            @error('comments')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <button type="submit" wire:click.prevent="storeComment()" class="p-2 m-3 btn btn-default rounded shadow text-dark">Send</button>

                        </form> -->
                    </div>
                    <div class="container ">
                        <p></p>
                        @foreach ($comments as $comment)


                        <div class="d-flex flex-start mb-4">
                            <img class="rounded-circle shadow-1-strong me-3" src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar" width="65" height="65" />
                            <div class="card w-100">
                                <div class="card-body p-4">
                                    <div class="">
                                        <h5>{{Auth::user()->name}}</h5>
                                        <p class="small">
                                            {{$comment->created_at}}
                                        </p>
                                        <p>
                                            {{$comment->comments}}
                                        </p>

                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <a href="#!" class="link-muted me-2"><i class="fas fa-thumbs-up me-1"></i>132</a>
                                                <a href="#!" class="link-muted"><i class="fas fa-thumbs-down me-1"></i>15</a>
                                            </div>
                                            <a href="/newComment" class="link-muted"><i class="fas fa-reply me-1"></i> Reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>


                </div>
            </div>
        </section>
    </div>
@endsection