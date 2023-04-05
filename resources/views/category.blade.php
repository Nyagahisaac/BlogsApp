@extends('layouts.base')

@section('title')
@endsection

@section('content')
<div class="col-md-12 mt-3 container">
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
  <div class="content p-2">

    <h4 class="title m-b-md text-center">Categories</h4>
    <!--  --> <a href="/" class="btn btn-default">Go Back</a>
    <div class="text-center" style="float:center">

    <!-- <input type="search" wire:model="searchTerm" class="form-control-lg"  placeholder="Search..."> -->
  </div>

    <div class="links" style="float:inline-end ">
      <a href="/newCategory" class="btn btn-outline-dark">New Category</a>
    </div>
  </div>
</div>
<div class="container">


  <table class="table align-middle mb-0 bg-white">
    <thead class="bg-light">
      <tr>
        <th>Name</th>
        <th>Created At</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $cat)
      <tr>
        <td>
          <div class="d-flex align-items-center">

            <div class="ms-3">
              <p class="fw-bold mb-1">{{$cat->name}}</p>
            </div>
          </div>
        </td>
        <td>
          <p class="fw-normal mb-1">{{$cat->created_at->format('dS M Y')}}</p>
        </td>
       <td>
          <!-- Edit -->
          <a href="" class="btn btn-sm btn-rounded">Edit</a>
          <!-- Delete -->

          @method('DELETE')
          <a href="{{route('categories.delete',[$cat->id])}}" class="btn btn-outline-danger">Delete</a>
        </td></span>
        </td>

      </tr>
      @endforeach

    </tbody>
  </table>
</div>
<script>
   $(document).ready(function() {
        setTimeout(() => {
            $('#error_message').remove();
            $('#success_message').remove();
        }, 3000)
    });
</script>
@endsection