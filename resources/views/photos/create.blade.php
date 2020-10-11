@extends('layouts.app')

@section('content')
<div class="container">
<h2>upload new photo</h2>
<form method="post" action="{{route('photo-store')}}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="album-id" value="{{$albumid}}">

    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" id="title"  placeholder="Enter title">
    </div>
    <div class="form-group">
       <label for="name">Discription</label>
       <input type="text" class="form-control" name="Discription" id="Discription"  placeholder="Enter Discription">
   </div>
   <div class="form-group">
        <label for="photo">Photo</label>
        <input type="file" class="form-control" name="photo" id="photo" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
