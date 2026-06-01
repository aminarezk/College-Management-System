@extends('layouts.app')
@include('temp.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
            <form action="{{route('att.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
               
                <select name="user_id">
                @foreach ($user as $item )
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
              @error('user_id')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

              <select name="subject_id">
                @foreach ($subject as $item )
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
                </select>
                @error('subject_id')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
              

                <input type="number" class="form-control mb-4" name="week"  placeholder="Week">
                                    @error('week')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<select name="status">
                <option value="present">Present</option>
                <option value="absent">Absent</option>
            </select>
            @error('status')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
         

                <input type="submit" class="btn btn-success btn-block" value="Create">

            </form>
        </div>
    </div>
</div>
@endsection