@extends('layout')

@section('content')

<div class="container">
  <div class="row">
      <div class="col-lg-12  mx-auto">

        	<a href="{{ route('write.post') }}" class="btn btn-info">write post</a>

        <hr>

        	<table class="table table-responsive">
        		<tr align="center">
        			<th>SL</th>
        			<th>category</th>
        			<th>title</th>
        			<th>image</th>
        			<th>Action</th>
        		</tr>
        		@foreach($post as $row )
        		<tr> 
        			<td align="center">{{ $row->id }}</td>
        			<td align="center">{{ $row->name }}</td>
        			<td align="center">{{ $row->title }}</td>
        			<td align="center"><img src="{{ URL::to($row->image) }}" style="height: 40px; width: 70px;"></td>
        			<td>
        				<a href="{{ URL::to ('Edit/post/'.$row->id) }}" class="btn btn-info">Edit</a>
                        <a href="{{ URL::to ('Delete/post/'.$row->id) }}" class="btn btn-danger" id="Delete">Delete</a>
        				<a href="{{ URL::to ('View/post/'.$row->id) }}" class="btn btn-success">View</a>

        			</td>
        		</tr>
        		@endforeach
        	</table>
        
      </div>
    </div>
</div>

@endsection

