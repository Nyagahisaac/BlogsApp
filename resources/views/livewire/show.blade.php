@extends('layouts.base')

@section('title')
@livewireStyles
@endsection

@section('content')

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="container mt-5 p-5">
    <div class="row">
      <div class="col-4">
        <input type="search" wire:model="searchTerm" placeholder="search...">
      </div>
    </div>

    <table class="table align-middle mb-0 bg-white">

      <thead class="bg-light">
        <tr>
          <th>Title</th>
          <th>Status</th>
          <th>Position</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      <h1>Categories</h1>
      @foreach($categories as $category)

@if(Auth::user()->id == $comment->user_id)
@if($post->id == $category->post_id)
<!--  -->
        @foreach ($post as $index => $posts)

        <tr>
          <td>
            <div class="d-flex align-items-center">
              <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
              <div class="ms-3">
                <p class="fw-bold mb-1">{{$posts -> title}}</p>
                <p class="text-muted mb-0">john.doe@gmail.com</p>
              </div>
            </div>
          </td>
          <td>
            <p class="fw-normal mb-1">Software engineer</p>
            <p class="text-muted mb-0">IT department</p>
          </td>
         
          <td>Senior</td>
          <td>
            <button type="button" class="btn btn-link btn-sm btn-rounded">
              Edit
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
@endsection