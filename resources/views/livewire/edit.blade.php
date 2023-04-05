@extends('layouts.base')

@section('content')
<style>
    .select {
        width: 100%;
        height: 50px;
        background-color: #fff;
        border: 1.5px solid gray;
        border-radius: 10px;
        padding: 10px;
    }

    .form-label {
        font-size: 18px;
        font-weight: 400;
    }

    textarea {
        border: 1.5px solid gray;

    }
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach()
            </div>
            @endif
            <div class="container">

                <form action="{{ route('posts.update', $posts->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <h2> </h2>
                    <!-- Gutter g-1 -->
                    <section class="h-100 container ">
                        <div class=" py-5 h-100 ">

                            <div class="row d-flex justify-content-center align-items-center h-50   ">
                                <div class="col  ">
                                    <div class="card card-registration p-5  bg-white" style="background-color:#fff; border-radius:20px; box-shadow: 0px 2px 10px 0px #eee;">
                                        <div class="row g-0">
                                            <a href="{{ route('posts') }}" class="label label-primary pull-right">Back</a>
                                            <div class="col-xl-8 ">
                                                <div class="card-body p-md-5 text-black">
                                                    <h3 class="mb-5 text-uppercase">Edit Blog Posts</h3>

                                                    <div class=" row">
                                                        <div class="col-md-6 mb-4">
                                                            <div class="form-outline">
                                                                <input type="text" id="title" style="border:1.5px solid gray" class="form-control form-control-lg" name='title' value="{{ $posts->title }}" reqiured />
                                                                <label class="form-label" for="form3Example1m">Title</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-4">
                                                            <div class="form-outline">

                                                                <select class="select" name="category_id" value="{{ $posts->category_id }}">

                                                                    @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                                    @endforeach

                                                                </select>
                                                                <label class="form-label" for="form3Example1m">Category</label>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row ">
                                                        <div class="form-outline mt-3">
                                                            <input type="file" id="title" style="border:1.5px solid gray" class="form-control form-control-lg" name='image' value="{{ $posts->image }}" reqiured />
                                                            <label class="form-label" for="form3Example1m">Upload Image</label>
                                                        </div>
                                                        <div class="form-outline mt-3">
                                                            <textarea type="text" id="mytextarea" class="form-control form-control-lg" name="post" style="border:1.5px solid black" required value="">{{ $posts->post }}</textarea>
                                                            <label class="form-label" for="form3Example1n">Description</label>
                                                        </div>


                                                    </div>



                                                </div>


                                                <div class=" pt-3 mt-3">
                                                    <div class="reset" style="float:inline-start;">
                                                        <button type="reset" class="btn btn-light btn-lg ">Cancel</button>
                                                    </div>
                                                    <div class="submit" style="float:inline-end;">
                                                        <button type="submit" class="btn btn-warning btn-lg ms-2 " value="update post">Send</button>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-xl-4 d d-xl-block   ">
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem; height:50vh;width:100%;" class="img-fluid" alt="Sample image">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </form>
            </div>

        </div>
    </div>
</div>
@endsection