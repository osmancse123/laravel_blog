@extends('layout')

@section('content')

<div class="container">
  <div class="row">
      <div class="col-lg-12  mx-auto">
        	<a href="{{ route('student') }}" class="btn btn-danger">add student</a>
        <hr>

        	<table class="table table-responsive">
        		<tr align="center">
        			<th>SL</th>
        			<th>Student Nane</th>
        			<th>Email</th>
        			<th>Phone</th>
        			<th>Action</th>
        		</tr>
        		@foreach($student as $row )
        		<tr> 
        			<td align="center">{{ $row->id }}</td>
        			<td align="center">{{ $row->name }}</td>
                    <td align="center">{{ $row->email }}</td>
        			<td align="center">{{ $row->phone }}</td>
        			<td>
        				<a href="{{ URL::to ('Edit/student/'.$row->id) }}" class="btn btn-info">Edit</a>
                        <a href="{{ URL::to ('Delete/student/'.$row->id) }}" class="btn btn-danger" id="Delete">Delete</a>
        				<a href="{{ URL::to ('View/student/'.$row->id) }}" class="btn btn-success">View</a>

        			</td>
        		</tr>
        		@endforeach
        	</table>
        
      </div>
    </div>
</div>

@endsection

