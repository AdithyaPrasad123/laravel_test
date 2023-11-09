@extends('index')
@section('content')
@if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
<table class="table table-dark mt-5 p-3">
    <tr>
        <th>NAME</th>
        <th>EMAIL ID</th>
        <th>DOB</th>
        <th>PLACE</th>
        <th>Image</th>
        <th colspan="2" class="text-center">ACTION</th>
        @foreach($data as $datas)
        <tr>
        
        
        <td>{{$datas->name}}</td>
        <td>{{$datas->email}}</td>
        <td>{{$datas->dob}}</td>
        <td>{{$datas->place}}</td>
        <td><img src="{{asset('storage/image/'.$datas->image)}}" alt="image" height="55" width="55"></td>
        <td><a href="{{route('edit',$datas->id)}}" class="btn btn-warning">EDIT</a></td>
        <td><a href="{{route('delete',$datas->id)}}" class="btn btn-danger">DELETE</a></td>

        
        
        </tr>
        @endforeach
    
</table>
@endsection