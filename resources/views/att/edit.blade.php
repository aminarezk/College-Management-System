@extends('layouts.app')
@extends('temp.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{route('att.update',$attendance->id)}}" enctype="multipart/form-data" method="POST">
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
                <input type="text" class="form-control mb-4" name="week"  placeholder="Week" value='{{ $attendance->week }}'>
                                    @error('week')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<select name="status">
        <option {{ $attendance->status == 'present'? 'selected' : '' }}>Present</option>
        <option {{ $attendance->status == 'absent'? 'selected' : '' }}>Absent</option>
            </select>
            @error('status')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  
                <input type="submit" class="btn btn-success btn-block" value="Update">

            </form>
        </div>
    </div>
</div>
@endsection