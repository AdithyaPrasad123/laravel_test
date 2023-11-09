@extends('index')
@section('content')
@if(Session::has('success'))
<p class="alert alert-info">{{ Session::get('success') }}</p>
@endif
<form action="{{route('doregister')}}" method="POST" class="mt-5 p-3 bg-info" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" class="form-control" placeholder="Enter the Name"><br>
    <input type="email" name="email" class="form-control" placeholder="Enter the Email id"><br>
    <input type="date" name="dob" class="form-control" placeholder="Enter the DOB"><br>
    <input type="text" name="place" class="form-control" placeholder="Enter the Place"><br>
    <input type="file" name="image"><br><br>
    <input type="submit" class="btn btn-primary">
</form>
@endsection