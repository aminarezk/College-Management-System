@extends('layouts.app')
@extends('temp.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{route('marks.update',$mark->id)}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                              <select name="subject_id">
                @foreach ($subject as $item )
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
                </select>
                @error('subject_id')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
              
            <select name="user_id">
                @foreach ($user as $item )
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
              @error('user_id')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                <input type="text" class="form-control mb-4" name="mark_value"  placeholder="Mark Value">
                                    @error('mark_value')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  
                <input type="submit" class="btn btn-success btn-block" value="Update">

            </form>
        </div>
    </div>
</div>
@endsection