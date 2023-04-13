@extends('layouts.app')

@section('content')

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">{{$post->title}}</h1>
        <p class="lead text-muted">{{$post->description}}</p>
        <img class="col-lg-6" src="{{$post->image_path}}">
      </div>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Made by XoreS powered by Bootstrap and Laravel</p>
  </div>
</footer>

@endsection
