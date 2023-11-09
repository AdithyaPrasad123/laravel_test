@extends('index')
@section('content')
@if(Session::has('success'))
<p class="alert alert-info">{{ Session::get('success') }}</p>
@endif
<form action="{{route('update',$row->id)}}" method="POST" class="mt-5 p-3 bg-info" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" class="form-control" value="{{$row->name}}"><br>
    <input type="email" name="email" class="form-control" value="{{$row->email}}"><br>
    <input type="date" name="dob" class="form-control" value="{{$row->dob}}"><br>
    <input type="text" name="place" class="form-control" value="{{$row->place}}"><br>
    <input type="file" name="image"><br><br>
    <input type="submit" class="btn btn-primary">
</form>
@endsection