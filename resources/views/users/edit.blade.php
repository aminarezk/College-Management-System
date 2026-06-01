@extends('layouts.app')
@extends('temp.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{route('users.update',$user->id)}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <input type="text" class="form-control mb-4" name="name" value="{{$user->name}}">
                                    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                <input type="email" class="form-control mb-4" name="email" value="{{$user->email}}">
                                    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                <input type="password" class="form-control mb-4" name="password" value="{{$user->password}}">
                                    @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<select name="role" class="form-control">
    <option value="user" {{$user->role=='user'? 'selectes' :''}}>User</option>
    <option value="admin" {{$user->role == 'admin'? 'selected':''}}>Admin</option>
</select>
                                    @error('role')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                <input type="text" class="form-control mb-4" name="year_id" value="{{$user->year_id}}">
                                    @error('year_id')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

                <input type="submit" class="btn btn-success btn-block" value="Update">

            </form>
        </div>
    </div>
</div>
@endsection