@if ($errors->any())
<div class="alert alert-danger">
  <u1>
 @foreach ($errors->all() as $error)
 <li>{{$error}}</li>
 @endforeach
</u1>
</div>
@endif


@if (session('success'))

<div class="alert alert-success">
{{ session('success')}}
</div>

@endif
