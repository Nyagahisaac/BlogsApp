@extends('layouts.base')

@section('title')
@endsection
@section('content')

<head>
    <script src="https://cdn.tiny.cloud/1/595co0zyk5vgk9k7xriq4r9rqkwhp32d9s44qlr1eo31ox3t/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


    <script>
        tinymce.init({
            selector: '#mytextarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ]
        });
    </script>
</head>
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

    <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
        @csrf
        <h2> </h2>
        <!-- Gutter g-1 -->
        <section class="h-100 container ">
            <div class=" py-5 h-100 ">

                <div class="row d-flex justify-content-center align-items-center h-50   ">
                    <div class="col  ">
                        <div class="card card-registration p-5  bg-white" style="background-color:#fff; border-radius:20px; box-shadow: 0px 2px 10px 0px #eee;">
                            <div class="row g-0">

                                <div class="col-xl-6 ">
                                    <div class="card-body p-md-5 text-black">
                                        <h3 class="mb-5 text-uppercase">Create New Post</h3>

                                        <div class=" row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" id="title" style="border:1.5px solid gray" class="form-control form-control-lg" name='title' reqiured />
                                                    <label class="form-label" for="form3Example1m">Title</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">

                                                    <select class="select" name="category_id">
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
                                                <input type="file" id="title" style="border:1.5px solid gray" class="form-control form-control-lg" name='image' reqiured />
                                                <label class="form-label" for="form3Example1m">Upload Image</label>
                                            </div>
                                            <div class="form-outline mt-3">
                                                <textarea type="text" id="mytextarea" class="form-control form-control-lg" name="post" style="border:1.5px solid black" required></textarea>
                                                <label class="form-label" for="form3Example1n">Description</label>
                                            </div>


                                        </div>



                                    </div>


                                    <div class=" pt-3 mt-3">
                                        <div class="reset" style="float:inline-start;">
                                            <button type="reset" class="btn btn-light btn-lg ">Cancel</button>
                                        </div>
                                        <div class="submit" style="float:inline-end;">
                                            <button type="submit" class="btn btn-warning btn-lg ms-2 ">Send</button>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-6 d d-xl-block   ">
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
@endsection