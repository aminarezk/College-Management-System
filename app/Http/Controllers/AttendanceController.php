<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Subject;
use App\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('att');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=User::all();
        $subject=Subject::all();
        return view('att.create', compact('user', 'subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'user_id'=>"required",
            'subject_id'=>"required",
            'week'=>"required",
            'status'=>"required",
        ]);
        Attendance::create($validateData);
        return redirect()->route('home')->with('mesg_att', __('language.Attendance created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        return view('att.show', compact('attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        $user=User::all();
        $subject=Subject::all();
        return view('att.edit', compact('attendance', 'user', 'subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        $validateData=$request->validate([
            'user_id'=>"required",
            'subject_id'=>"required",
            'week'=>"required",
            'status'=>"required",
        ]);
        $attendance->update($validateData);
        return redirect()->route('home')->with('mesg_att', __('language.Attendance updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('home')->with('mesg_att', __('language.Attendance deleted successfully.'));
    }
}
