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

        @if($errors->any())
        	<div class="alert alert-danger">
        		<ul>
        			@foreach ($errors->all() as $error)
        				<li>{{ $error }}</li>
        			@endforeach
        		</ul>
        	</div>

        @endif

        <form action="{{ route('store.category') }}" method="get">
           @csrf
	          <div class="control-group">
	            <div class="form-group floating-label-form-group controls">
	              <label>Add Category</label>
	              <input type="text" class="form-control" placeholder="Category Name" name="catname" required >
	             
	            </div>
	          </div>


	          <div class="control-group">
	            <div class="form-group floating-label-form-group controls">
	              <label>Slug</label>
	              <input type="text" class="form-control" placeholder="Slug Name" name="slug" required >
	              
	            </div>
	          </div>
	         
	          <br>
	          <div class="form-group">
	            <button type="submit" class="btn btn-primary">Submit</button>
	          </div>

        </form>
      </div>
    </div>
</div>

@endsection

