@extends('layout')

@section('content')

<div class="container">
  <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
   		 <p>
        	<a href="{{ route('add.category') }}" class="btn btn-danger">Add category</a>
        	<a href="{{ route('all.category') }}" class="btn btn-info">All category</a>
        </p>
        <hr>

        	<div>
        		<ol>
              <li>Category id: {{ $category->id }}</li>
        			<li>Category Name: {{ $category->name }}</li>
        			<li>Category Slug: {{ $category->slug }}</li>
        			<li>Created at: {{ $category->created_at }}</li>
        		</ol>
        	</div>
      </div>
    </div>
</div>

@endsection

