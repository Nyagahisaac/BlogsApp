@extends('layouts.base')

@section('title')
@livewireStyles
@endsection

@section('content')


<main class="text-center my-5 p-0 m-5">
    <!--  -->
    <div class="container">
        <div class="content text-center">
            @if(session('status'))
            <div class="alert alert-success text-white" id="error_message">
                {{ session('status') }}😊
            </div>
            @endif
        </div>
        <div class="row">

            <div class="col-md-12">

                <div class="row">
                    <h1>
                        Welcome To
                        <i class="fas fa-cubes fa-1x me-3" style="color: #ff6219;">Blogs</i>
                    </h1>
                    <!-- <div class="col mt-3">
                        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4 d-flex" style="justify-content: space-between;">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="/post">Blogs</a></li>
                                <li class="breadcrumb-item"><a href="/comments">Comments</a></li>
                                <li class="breadcrumb-item active"> <a href="/category">Categories</a> </li>
                            </ol>
                            <ol>
                                <div class="bg-gray text-center  d-flex align-items-center justify-content-center border-radius-5">

                                    <i class="material-icons opacity-10 " style="transform:translate(150% ,0); color:black;">search</i>
                                    <input type="text" wire:model="search" class="form-control text-center form-control-lg bg-white" placeholder="Search" />


                            </div>
                            </ol>
                        </nav>
                    </div> -->
                </div>

            </div>
            <div class="col mt-2">
                <div id="carouselExampleCaptions" class="carousel slide" data-mdb-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://mdbcdn.b-cdn.net/img/new/slides/041.webp" class="d-block w-100" alt="Wild Landscape" />
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-white">Culture</h5>
                                <p class="text-white">Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://mdbcdn.b-cdn.net/img/new/slides/042.webp" class="d-block w-100" alt="Camera" />
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-primary">Art & Craft</h5>
                                <p class="text-back">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://mdbcdn.b-cdn.net/img/new/slides/043.webp" class="d-block w-100" alt="Exotic Fruits" />
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-back">Foods and Nutrition</h5>
                                <p class="text-back">Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light">
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                    </div>
                    <div class="bg-light">
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>


                </div>
            </div>

            <section class="mt-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-10 col-xl-8 text-center">
                        <h3 class="mb-4">Fashion</h3>
                        <p class="mb-4 pb-2 mb-md-5 pb-md-0">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet
                            numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum
                            quisquam eum porro a pariatur veniam.
                        </p>
                    </div>
                </div>

                <div class="row text-center">

                    <div class="col-md-4 mb-5 mb-md-0">
                        <div class="card testimonial-card">
                            <div class="card-up" style="background-color: #9d789b;"></div>
                            <div class="avatar mx-auto bg-white">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(1).webp" class="rounded-circle img-fluid" />
                            </div>
                            <div class="card-body">
                                <h4 class="mb-4">Maria Smantha</h4>
                                <hr />
                                <p class="dark-grey-text mt-4">
                                    <i class="fas fa-quote-left pe-2"></i>Lorem ipsum dolor sit amet eos adipisci,
                                    consectetur adipisicing elit.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5 mb-md-0">
                        <div class="card testimonial-card">
                            <div class="card-up" style="background-color: #7a81a8;"></div>
                            <div class="avatar mx-auto bg-white">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(2).webp" class="rounded-circle img-fluid" />
                            </div>
                            <div class="card-body">
                                <h4 class="mb-4">Tourism and Travell</h4>
                                <hr />
                                <p class="dark-grey-text mt-4">
                                    <i class="fas fa-quote-left pe-2"></i>Neque cupiditate assumenda in maiores
                                    repudi mollitia architecto.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-0">
                        <div class="card testimonial-card">
                            <div class="card-up" style="background-color: #6d5b98;"></div>
                            <div class="avatar mx-auto bg-white">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(9).webp" class="rounded-circle img-fluid" />
                            </div>
                            <div class="card-body">
                                <h4 class="mb-4">Food and Nutrition</h4>
                                <hr />
                                <p class="dark-grey-text mt-4">
                                    <i class="fas fa-quote-left pe-2"></i>Delectus impedit saepe officiis ab
                                    aliquam repellat rem unde ducimus.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
</main>
@livewireScripts
<script>
    $(document).ready(function() {
        setTimeout(() => {
            $('#error_message').remove();
            $('#success_message').remove();
        }, 5000)
    });
</script>
@endsection