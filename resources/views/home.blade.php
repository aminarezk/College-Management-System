@extends('layouts.app')
@include('temp.navbar')
@section('content')
<div class="container justify-content-center">
    <div class="row d-flex ">
        <div class="col-md-6">

            <div class="card" >
                <div class="card-header">{{ __('language.User') }} <span class="badge badge-primary">{{$user->count()}}</span></div>

                <div class="card-body">
                    @if (session('mesg'))
                         <h4 class="text-center alert alert-success">{{session('mesg')}}</h4>
                    @endif
                    <div class="table-responsive">
                    <table class="table table-dark text-center">
                        <thead>
                            <tr>
                                <th>{{__('language.Id')}}</th>
                                <th>{{__('language.Name')}}</th>
                                <th>{{__('language.Email')}}</th>
                                <th>{{__('language.Year_id')}}</th>
                                <th>{{__('language.Oprations')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->year_id}}</td>
                                 <td>
                                <div class="d-flex align-items-center  gap-2 justify-content-center">
                               <a href="{{route('users.show',$item->id)}}" class="btn btn-success btn-sm">
                               <i class="fa-solid fa-eye"></i>{{__('language.show')}}
                                  </a>
                                 
                                <a href="{{route('users.edit',$item->id)}}" class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-trash"></i>{{__('language.edit')}}
                                   </a>
                                <form method="POST" action="{{route('users.destroy',$item->id)}}" class="m-0 p-0">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm"><i class="fa-solid fa-pencil"></i>{{__('language.delete')}}</button>
                                  </form>

                                </div>
                                 </td>
        
                            </tr>
                                
                            @endforeach
                        </tbody>

                    </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="card" >
                <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-header">{{ __('language.Subject') }} <span class="badge badge-primary">{{$subject->count()}}</span></div>
                <a href={{route('subjects.create')}} class="btn btn-success">{{__('language.Create Subject')}}</a>
                </div>
                <div class="card-body">
                    @if (session('mesg_sub'))
                         <h4 class="text-center alert alert-success">{{session('mesg_sub')}}</h4>
                    @endif
                    <div class="table-responsive">
                    <table class="table table-dark text-center">
                        <thead>
                            <tr>
                                <th>{{__('language.Id')}}</th>
                                <th>{{__('language.Name')}}</th>
                                <th>{{__('language.Oprations')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subject as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                 <td>
                                <div class="d-flex align-items-center  gap-2 justify-content-center">
                               <a href={{route('subjects.show',$item->id)}} class="btn btn-success btn-sm">
                               <i class="fa-solid fa-eye"></i>{{__('language.show')}}
                                  </a>
                                 
                                <a href={{route('subjects.edit',$item->id)}} class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-trash"></i>{{__('language.edit')}}
                                   </a>
                                <form method="POST" action="{{route('subjects.destroy',$item->id)}}" class="m-0 p-0">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm"><i class="fa-solid fa-pencil"></i>{{__('language.delete')}}</button>
                                  </form>

                                </div>
                                 </td>
        
                            </tr>
                                
                            @endforeach
                        </tbody>

                    </table>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-md-6">
            <div class="card" >
                <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-header">{{ __('language.Mark') }} <span class="badge badge-primary">{{$mark->count()}}</span></div>
                <a href={{route('marks.create')}} class="btn btn-success">{{__('language.Create Mark')}}</a>
                </div>
                <div class="card-body">
                    @if (session('mesg_ma'))
                         <h4 class="text-center alert alert-success">{{session('mesg_ma')}}</h4>
                    @endif
                    <div class="table-responsive">
                    <table class="table table-dark text-center">
                        <thead>
                            <tr>
                                <th>{{__('language.Id')}}</th>
                                <th>{{__('language.User_id')}}</th>
                                <th>{{__('language.Subject_id')}}</th>
                                <th>{{__('language.Value')}}</th>
                                <th>{{__('language.Oprations')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mark as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->user_id}}</td>
                                <td>{{$item->subject_id}}</td>
                                <td>{{$item->mark_value}}</td>
                                 <td>
                                <div class="d-flex align-items-center  gap-2 justify-content-center">
                               <a href={{route('marks.show',$item->id)}} class="btn btn-success btn-sm">
                               <i class="fa-solid fa-eye"></i>{{__('language.show')}}
                                  </a>
                                 
                                <a href={{route('marks.edit',$item->id)}} class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-trash"></i>{{__('language.edit')}}
                                   </a>
                                <form method="POST" action="{{route('marks.destroy',$item->id)}}" class="m-0 p-0">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm"><i class="fa-solid fa-pencil"></i>{{__('language.delete')}}</button>
                                  </form>

                                </div>
                                 </td>
        
                            </tr>
                                
                            @endforeach
                        </tbody>

                    </table>
                    </div>
                </div>
            </div>
                    </div>




            <div class="col-md-6">
                        <div class="card" >
                <div class="card-header d-flex justify-content-between align-items-center">
                <div class="card-header">{{ __('language.Attendece') }} <span class="badge badge-primary">{{$attendance->count()}}</span></div>
                <a href={{route('att.create')}} class="btn btn-success">{{__('language.Create Attendece')}}</a>
                </div>
                <div class="card-body">
                    @if (session('mesg_att'))
                         <h4 class="text-center alert alert-success">{{session('mesg_att')}}</h4>
                    @endif
                    <div class="table-responsive">
                    <table class="table table-dark text-center">
                        <thead>
                            <tr>
                                <th>{{__('language.Id')}}</th>
                                <th>{{__('language.User_id')}}</th>
                                <th>{{__('language.Subject_id')}}</th>
                                <th>{{__('language.Status')}}</th>
                                <th>{{__('language.Oprations')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendance as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->user_id}}</td>
                                <td>{{$item->subject_id}}</td>
                                <td>{{$item->status}}</td>
                                 <td>
                                <div class="d-flex align-items-center  gap-2 justify-content-center">
                               <a href={{route('att.show',$item->id)}} class="btn btn-success btn-sm">
                               <i class="fa-solid fa-eye"></i>{{__('language.show')}}
                                  </a>
                                 
                                <a href={{route('att.edit',$item->id)}} class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-trash"></i>{{__('language.edit')}}
                                   </a>
                                <form method="POST" action="{{route('att.destroy',$item->id)}}" class="m-0 p-0">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm"><i class="fa-solid fa-pencil"></i>{{__('language.delete')}}</button>
                                  </form>

                                </div>
                                 </td>
        
                            </tr>
                                
                            @endforeach
                        </tbody>

                    </table>
                    </div>
                </div>
            </div>
                    </div>
        




































    </div>
</div>  
@endsection
