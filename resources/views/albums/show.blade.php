@extends('layouts.app')


@section('content')

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">{{$album->name}}</h1>
          <p class="lead text-muted"> {{$album->description}}</p>
          <p>
            <a href="{{route('photo-create',$album->id)}}" class="btn btn-primary my-2">Upload phots</a>
            <a href="#" class="btn btn-secondary my-2">Go Back</a>
          </p>
        </div>
      </section>

      @if (count($album->photos)> 0)
      <div class="container">
        <div class="row">
          @foreach($album->photos as $photo)
        <div class="col-md-4">
         <div class="card mb-4 box-shadow">
           <img src="http://localhost/photoshow/storage/app/public/albums/{{$album->id}}/{{$photo->photo}}" height="200px" alt="{{$photo->photo}}">
            <div class="card-body">
             <p class="card-text">{{$photo->description}} </p>
             <div class="d-flex justify-content-between align-items-center">
               <div class="btn-group">
                 <a href="{{route('photo-show',$photo->id)}}" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                 <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
               </div>
               <small class="text-muted">{{$photo->size}}</small>
             </div>
           </div>
         </div>
        </div>
        @endforeach
        </div>
      </div>
      @else
      <h3>No albums yet.</h3>
      @endif



@endsection
