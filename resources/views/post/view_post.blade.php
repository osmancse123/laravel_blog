@extends('layout')

@section('content')

<div class="container">
  <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

          <a href="{{ route('all.post') }}" class="btn btn-info">All Post</a>       

        <hr>

        	<div>

        			<h3>Category title: {{ $post->title }}</h3>
        			<img src="{{ URL::to($post->image) }}"  height="300px;" width="500px;">
        			<li>Category id: {{ $post->id }}</li>
        			<li>Category Name: {{ $post->name }}</li>
        			<p>Category details: {{ $post->details }}</p>
        	
        	</div>
      </div>
    </div>
</div>

@endsection

