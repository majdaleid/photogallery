@extends('layouts.app')

@section('content')
<div class="container">
<h2>create new album</h2>
<form method="post" action="{{route('album-store')}}" enctype="multipart/form-data">
  @csrf

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name"  placeholder="Enter name">
    </div>
    <div class="form-group">
       <label for="name">Discription</label>
       <input type="text" class="form-control" name="Discription" id="Discription"  placeholder="Enter Discription">
   </div>
   <div class="form-group">
        <label for="cover-image">Cover Image</label>
        <input type="file" class="form-control" name="cover-image" id="cover-image" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
