<?php

namespace App\Http\Controllers;

use App\User;
use App\Subject;
use App\Subject_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        return view('user.result', compact('user'));
    }
    public function show()
    {
        $user = Auth::user();
        $subject = $user->subjects()
            ->with(['attendance'=> function($query) {
                $query->where('user_id', Auth::id());
            }
            , 'mark'=> function($query) {
                $query->where('user_id', Auth::id());
            }])
            ->get();
        return view('first.show', compact(['user', 'subject']));
    }
     public function create()
    {
           $user = Auth::user();
        //    $subject = Subject::orderBy('id', 'asc')->limit(5)->get();
           $subject = Subject::all();
        return view('first.create', compact(['user', 'subject']));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required',

        ]);
          Subject_user::create([
            'user_id' => Auth::id(),
            'subject_id' => $request->name,
          ]);
        return redirect()->route('user.result')->with('mesg',"{{   __('language.Created successfuly')}}");
    }
}
