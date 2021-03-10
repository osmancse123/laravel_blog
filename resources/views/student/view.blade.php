@extends('layout')

@section('content')

<div class="container">
  <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

          <a href="{{ route('all.student') }}" class="btn btn-info">All student</a>       
          <a href="{{ route('student') }}" class="btn btn-info">add student</a>       

        <hr>

        	<div>
        		<ol>
        			<li>Student Id: {{ $student->id }}</li>
        			<li>Student Name: {{ $student->name }}</li>
        			<li>Student Email: {{ $student->email }}</li>
        			<li>Student Phone: {{ $student->phone }}</li>
        			<li>Created at: {{ $student->created_at }}</li>
        		</ol>
        	</div>
      </div>
    </div>
</div>

@endsection

