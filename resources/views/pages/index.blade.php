@extends('layout')

@section('content')

<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      	@foreach($post as $row)
        <div class="post-preview">
          <a href="{{ URL::to ('View/post/'.$row->id) }}">
	         	  <img src="{{ URL::to($row->image) }}" style="height: 250px; width: 450px;">
	         	  <h2 class="post-title">
	                {{ $row->title }}
	              </h2>
          </a>
          <p class="post-meta">category
            <a href="#">{{ $row->name }}</a>
            on slug {{ $row->slug }}</p>
        </div>
        <hr>
        @endforeach

        {{ $post->links() }}
        
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
    </div>

@endsection

