@extends('layouts.app')
@include('temp.navbar')
@section('content')
<div class="container pt-5">
    <div class="row w-100">
        <div class="col-md-12">
            @if ($user->year_id =="1")
                           <div class="table-responsive">
                            @if (session('mesg'))
                            <h4><span style="color: green;">{{ session('mesg') }}</span></h4>                                
                            @endif
                    <table class="table table-light text-center" border="2">
                        <thead>
                            <tr>
                                <th>{{__('language.Academic year')}}</th>
                                <th>{{__('language.View your subjects and their details')}}</th>
                                <th>{{__('language.Register in your subjects')}}</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @auth
                            <tr>
                                <td><span style="background-color: yellow;">{{__('language.First Year')}}</span></td>
                                <td > 
                                  <a href={{route('first.show')}} class="btn btn-success px-4">
                               <i class="fa-solid fa-eye"></i>{{__('language.Show')}}
                                  </a>
                                 </td>
                                 
                               <td> <a href={{ route('first.create') }} class="btn btn-primary px-4">
                                <i class="fa-solid fa-trash"></i>{{__('language.Register')}}
                                   </a>
                                </td>
                            </tr>
                            @endauth
                        </tbody>

                    </table>
                </div>  
             
           @elseif ($user->year_id =="2")
                     <div class="table-responsive">
                    <table class="table table-light text-center" border="2">
                        <thead>
                            <tr>
                                <th>{{__('language.Academic year')}}</th>
                                  <th>{{__('language.View your subjects and their details')}}</th>
                                <th>{{__('language.Register in your subjects')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @auth
                            <tr>
                                <td><span style="background-color: yellow;">{{__('language.Seconde Year')}}</span></td>
                                   <td > 
                                  <a href={{route('sec.show')}} class="btn btn-success px-4">
                               <i class="fa-solid fa-eye"></i>{{__('language.Show')}}
                                  </a>
                                 </td>
                                 
                               <td> <a href={{ route('sec.create') }} class="btn btn-primary px-4">
                                <i class="fa-solid fa-trash"></i>{{__('language.Register')}}
                                   </a>
                                </td>
                            </tr>
                            @endauth
                        </tbody>

                    </table>
                </div>
                           @elseif ($user->year_id =="3")
                     <div class="table-responsive">
                    <table class="table table-light text-center" border="2">
                        <thead>
                            <tr>
                                <th>{{__('language.Academic year')}}</th>
                                  <th>{{__('language.View your subjects and their details')}}</th>
                                <th>{{__('language.Register in your subjects')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @auth
                            <tr>
                                <td><span style="background-color: yellow;">{{__('language.Seconde Year')}}</span></td>
                                   <td > 
                                  <a href={{route('third.show')}} class="btn btn-success px-4">
                               <i class="fa-solid fa-eye"></i>{{__('language.Show')}}
                                  </a>
                                 </td>
                                 
                               <td> <a href={{ route('third.create') }} class="btn btn-primary px-4">
                                <i class="fa-solid fa-trash"></i>{{__('language.Register')}}
                                   </a>
                                </td>
                            </tr>
                            @endauth
                        </tbody>

                    </table>
                </div>

                 @else
                     <div class="table-responsive">
                    <table class="table table-light text-center" border="2">
                        <thead>
                            <tr>
                                <th>{{__('language.Academic year')}}</th>
                                 <th>{{__('language.View your subjects and their details')}}</th>
                                <th>{{__('language.Register in your subjects')}}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @auth
                            <tr>
                                <td><span style="background-color: yellow;">{{__('language.Fourth Year')}}</span></td>
                                 <td > 
                                  <a href={{route('fourth.show')}} class="btn btn-success px-4">
                                    <i class="fa-solid fa-eye"></i>{{__('language.Show')}}
                                  </a>
                                 </td>
                                 
                               <td> 
                              <a href={{ route('fourth.create') }} class="btn btn-primary px-4">
                                <i class="fa-solid fa-trash"></i>{{__('language.Register')}}
                              </a>
                                </td>
                            </tr>
                            @endauth
                        </tbody>

                    </table>
                </div>







            @endif

                
   

        </div>
    </div>
</div>




@endsection