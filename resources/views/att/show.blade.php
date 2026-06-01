@extends('layouts.app')
@extends('temp.navbar')
@section('content')

<div class="container pt-3 mt-3">
    <div class="row d-flex">
        <div class="col m-auto">
            <div class="card">
                <div class="card-header"> {{__('language.Detailes Of')}}  {{ __('language.Attendance') }} 
                    <span class="badge badge-primary">1</span>
                </div>
                <div class="card-body">
                    <table class="table table-dark text-center">
                        <thead>
                            <tr>
                                <th>{{__('language.Id')}}</th>
                                <th>{{__('language.Subject_id')}}</th>
                                <th>{{__('language.User_id')}}</th>
                                <th>{{__('language.Status')}}</th>
                                <th>{{__('language.Created_at')}}</th>
                                <th>{{__('language.Updated_at')}}</th>
                                <th>{{__('language.Oprations')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$attendance->id}}</td>
                                <td>{{$attendance->subject_id}}</td>
                                <td>{{$attendance->user_id}}</td>
                                <td>{{$attendance->status}}</td>
                                <td>{{$attendance->created_at}}</td>
                                <td>{{$attendance->updated_at}}</td>
                                 <td>
                                    <div class="d-flex flex-column align-items-center">
                               <a href={{route('home')}} class="btn btn-success">
                                <i class="fa-solid fa-house"></i>{{__('language.Home')}}
                               </a>
                                    </div>
                                 </td>
                               
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>



@endsection







