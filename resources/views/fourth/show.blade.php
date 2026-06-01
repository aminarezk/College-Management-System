@extends('layouts.app')
@extends('temp.navbar')
@section('content')

<div class="container pt-3 mt-3">
    <div class="row d-flex">
        <div class="col m-auto">
            <div class="card">
                <div class="card-header"> {{__('language.Detailes Of')}}  {{$user->name}} 
                </div>
                <div class="card-body">
                    <table class="table table-dark text-center">
                        <thead>
                            <tr>
                                <th>{{__('language.Subject')}}</th>
                                <th>{{__('language.User-Id')}}</th>
                                <th>{{__('language.Marks')}}</th>
                                <th>{{__('language.Attendece')}}</th>
                                <th>{{__('language.Oprations')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach ($subject as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$user->id}}</td>
                                <td>
                                    @foreach ($item->mark as $mark)
                                        {{$mark->mark_value}}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($item->attendance as $att)
                                    {{$att->week}}{{$att->status}}
                                    @endforeach
                                </td>                                
                                <td>
                                <div class="d-flex flex-column align-items-center">
                               <a href={{route('user.result')}} class="btn btn-success">
                                <i class="fa-solid fa-house"></i>{{__('language.Home')}}
                               </a>
                                </div>
                                </td> 
                            </tr>
                           @endforeach
                        </tbody>

                    </table>
                    

                </div>
            </div>
        </div>



@endsection








