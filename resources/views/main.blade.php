@extends('layouts.app')

@section('content')

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        @if(Auth::check())
        <h1 class="fw-light">Welcome {{Auth::user()->name}}, check our posts</h1>
        @else
        <h1 class="fw-light">Check our posts</h1>
        @endif
        <p class="lead text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae ducimus facilis quia est temporibus dolore quisquam, deleniti cum numquam. Nulla, asperiores dolores. Ipsa dolores vitae alias, rem labore facere perferendis.</p>
      </div>
    </div>
    @if(session()->has('message'))
        <div>
          <h2>{{session()->get('message')}}</h2>
        </div>
    @endif
    @if (Auth::check() && Auth::user()->role == 'Admin')
                <a href="blog/create" type="button" class="btn btn-primary">Add new post</a>
    @endif
  </section>
  <div class="album bg-light">
    
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      @foreach($posts as $post)
        <div class="col">
          <div class="card shadow-sm">
            <img class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" src="{{$post->image_path}}"></img>

            <div class="card-body">
              <h2 class="card-title">{{$post->title}}</h2>
              <p class="card-text">{{Str::limit($post->description, 50, '...')}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="/blog/{{$post->slug}}" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                  @if(Auth::check() && Auth::user()->role == 'Admin')                  
                    <a href="/blog/{{$post->slug}}/edit" type="button" class="btn btn-sm btn-outline-secondary">Edit</a>
                    <form
                      action="/blog/{{$post->slug}}"
                      method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                    </form>
                  @endif
                </div>
                <small class="text-muted">Created by: {{$post->user->name}}</small>
              </div>
            </div>
          </div>
        </div>
      @endforeach
          </div>
        </div>
      </div>
      </div>
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
