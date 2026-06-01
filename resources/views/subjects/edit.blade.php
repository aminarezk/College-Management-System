@extends('layouts.app')
@extends('temp.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{route('subjects.update',$subject->id)}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <input type="text" class="form-control mb-4" name="name" value="{{$subject->name}}">
                                    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
             

                <input type="submit" class="btn btn-success btn-block" value="Update">

            </form>
        </div>
    </div>
</div>
@endsection