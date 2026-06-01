<?php

namespace App\Http\Controllers;

use App\Mark;
use Illuminate\Http\Request;
use App\Subject;
use App\User;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('marks');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subject=Subject::all();
        $user=User::all();
        return view('marks.create', compact('subject', 'user'));
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
            'subject_id'=>"required",
            'user_id'=>"required",
            'mark_value'=>"required",
        ]);
        Mark::create($validateData);
        return redirect()->route('home')->with('mesg_ma', __('language.Mark created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function show(Mark $mark)
    {
        return view('marks.show',compact('mark'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function edit(Mark $mark)
    {
        $subject=Subject::all();
        $user=User::all();
        return view('marks.edit',compact('mark', 'subject', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mark $mark)
    {
        $validateData=$request->validate([
            'subject_id'=>"required",
            'user_id'=>"required",
            'mark_value'=>"required",
        ]);
        $mark->update($validateData);
        return redirect()->route('home')->with('mesg_ma', __('language.Mark updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mark $mark)
    {
        $mark->delete();
        return redirect()->route('home')->with('mesg_ma', __('language.Mark deleted successfully.'));
    }
}
