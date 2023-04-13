@extends('layouts.app')

@section('content')

<main>

  <section class="py-3 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Edit post</h1>
        <p class="lead text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae ducimus facilis quia est temporibus dolore quisquam, deleniti cum numquam. Nulla, asperiores dolores. Ipsa dolores vitae alias, rem labore facere perferendis.</p>
      </div>
    </div>
    <div>
      @if($errors->any())
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      @endif
    </div>
  </section>
    <div class="container">
    <form
    action="/blog/{{$post->slug}}"
    method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="title">Title</label>
      <input type="text" name="title" class="form-control" id="title" value="{{$post->title}}">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="image">Image</label>
      <input type="text" name="image" class="form-control" id="image" value="{{$post->image_path}}">
    </div>
  </div>
  <div class="form-group">
    <label for="desc">Text</label>
    <textarea  name="desc" class="form-control" id="desc" rows="5" class="form-control" value="{{$post->description}}">{{$post->description}}</textarea>
  </div>
  <div class="m-3"><button type="submit" class="btn btn-primary">Edit</button></div>
  
</form>
        </div>
      
</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Made by XoreS powered by Bootstrap and Laravel</p>
  </div>
</footer>

@endsection
