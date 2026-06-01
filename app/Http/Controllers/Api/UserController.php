<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Subject;
use App\Mark;
use App\Attendance;
use App\Subject_user;

class UserController extends Controller
{
   public function index(Request $request){
    if ($request->user()->role !== "admin"){
        return response()->json(['mesg'=>'unauthzoried',
        'data'=>null,
        ]);
    }
    return response()->json([
        'users'=>User::All(),
        'subjects'=>Subject::All(),
        'marks'=>Mark::All(),
        'Attendance'=>Attendance::All(),
        'Subject_user'=>Subject_user::All(),
    ]);
   }

   public function profile(Request $request){
    return response()->json([
        'users'=>$request->user(),
        'subjects'=>Subject::where('user_id',$request->user()->id)->get(),
        'marks'=>Mark::where('user_id',$request->user()->id)->get(),
        'Attendance'=>Attendance::where('user_id',$request->user()->id)->get(),
        'Subject_user'=>Subject_user::where('user_id',$request->user()->id)->get(),
    ]);
   }
}
