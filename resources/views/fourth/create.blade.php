@extends('layouts.app')
@include('temp.navbar')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form action="{{route('fourth.store')}}" enctype="multipart/form-data" method="POST">
                @csrf

                
                <label>{{ __('language.Subject') }}</label>
                <select name="name" class="form-control mb-4">
                    <option>{{ __('language.Select subject') }}</option>
                    @foreach ($subject as $item)
                    <option value="{{$item->id}}">
 {{ $item->id }} - {{ $item->name }}                  
                   </option> 
                    @endforeach
                </select>
                                    @error('user_id')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror



                <input type="submit" class="btn btn-success btn-block" value={{ __('language.Create') }}>

            </form>
        </div>
    </div>
</div>
@endsection