@extends('layout')

@section('content')

<div class="container">
  <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

          <a href="{{ route('all.post') }}" class="btn btn-info">All Post</a>       

        <hr>
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
       
        <form action="{{ url('update/post/'.$post->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Title</label>
              <input type="text" class="form-control" value="{{ $post->title }}" name="title" required>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>category</label>
              <select class="form-control" name="category_id">
                @foreach($category as $row)
                <option value="{{ $row->id }}" <?php if($row->id == $post->category_id) echo "selected"; ?> >{{ $row->name }}</option>
                @endforeach
              </select>
             
            </div>
          </div>


          <div class="control-group ">
            <div class="form-group ">
              <label>new image</label>
              <input type="file" class="form-control" name="image" ><br>
              old image:<img src="{{ URL::to($post->image) }}" style="height: 40px; width: 80px;">

              <input type="hidden" name="old_photo" value="{{ $post->image }}">
              
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Details</label>
              <textarea rows="5" class="form-control" name="details" required>
                {{ $post->details }}
              </textarea>
              
            </div>
          </div>
          <br>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">update</button>
          </div>
        </form>
      </div>
    </div>
</div>

@endsection

