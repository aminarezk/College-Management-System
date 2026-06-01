<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Subject;
use App\Mark;
use App\Attendance;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=User::all();
        $subject=Subject::all();
        $mark=Mark::all();
        $attendance=Attendance::all();
        return view('home', compact('user', 'subject', 'mark', 'attendance'));
    }
}
