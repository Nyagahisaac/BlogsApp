@extends('base')

@section('title')
Blog Post
@endsection

@section('content')
<div class="container">
<section style="background-color: #eee;">
  <div class="container my-5 py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10 col-xl-8">
        <div class="card">
          
          <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
          <form id="members" name="members" method="POST" action="{{route('createComments')}}">
            @csrf
            <div class="d-flex flex-start w-100">
              <img class="rounded-circle shadow-1-strong me-3"
                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="40"
                height="40" />
               
              <div class="form-outline w-100">
                <textarea class="form-control" rows="4" name="comments" id="comments"
                  style="background: #fff;"></textarea>
                <label class="form-label" for="textAreaExample">Message</label>
              </div>
            </div>
            <div class="float-end mt-2 pt-1">
                
              <button type="submit" class="btn btn-primary btn-sm">Send</button>
              <button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>
            </div>
          </div>
</form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
@endsection