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

        	<table class="table table-responsive">
        		<tr align="center">
        			<th>SL</th>
        			<th>category Name</th>
        			<th>Slug Name</th>
        			<th>Creat at</th>
        			<th>Action</th>
        		</tr>
        		@foreach($category as $row )
        		<tr> 
        			<td align="center">{{ $row->id }}</td>
        			<td align="center">{{ $row->name }}</td>
        			<td align="center">{{ $row->slug }}</td>
        			<td align="center">{{ $row->created_at }}</td>
        			<td>
        				<a href="{{ URL::to ('Edit/category/'.$row->id) }}" class="btn btn-info">Edit</a>
                        <a href="{{ URL::to ('Delete/category/'.$row->id) }}" class="btn btn-danger" id="Delete">Delete</a>
        				<a href="{{ URL::to ('View/category/'.$row->name) }}" class="btn btn-success">View</a>

        			</td>
        		</tr>
        		@endforeach
        	</table>
        
      </div>
    </div>
</div>

@endsection

