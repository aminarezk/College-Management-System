<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubjectUserResource;
use App\Subject_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suser = SubjectUserResource::collection(Subject_user::all());
        return response()->json([
            'mesg' => 'All recordes',
            'data' => $suser
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validtor = Validator::make($request->all(), [
            'user_id' => 'required',
            'subject_id' => 'required',
        ]);
        if ($validtor->fails()) {
            return response()->json(
                [
                    'mesg' => 'validation error',
                    'data' => $validtor->errors(),
                ]
            );
        }
        $data = $validtor->validate();
        $sub = Subject_user::create($data);
        return response()->json([
            'mesg' => 'Created subject',
            'data' => $sub
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sub = Subject_user::findorfail($id);
        if (!$sub) {
            return response()->json([
                'mesg' => 'No such data',
                'data' => null
            ]);
        }
        return response()->json([
            'mesg' => 'one record',
            'data' => $sub
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sub = Subject_user::findorfail($id);
        if (!$sub) {
            return response()->json([
                'mesg' => 'No such data',
                'data' => null
            ]);
        }
        $validtor = Validator::make($request->all(), [
            'user_id' => 'required',
            'subject_id' => 'required',
        ]);
        if ($validtor->fails()) {
            return response()->json(
                [
                    'mesg' => 'validation error',
                    'data' => $validtor->errors(),
                ]
            );
        }
        $data = $validtor->validate();
        $result = $sub->update($data);
        return response()->json([
            'mesg' => 'Updated record',
            'data' => $result
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub = Subject_user::findorfail($id);
        if (!$sub) {
            return response()->json([
                'mesg' => 'No such data',
                'data' => null
            ]);
        }
        $sub->delete();
        return response()->json([
            'mesg' => 'Deleted record',
            'data' => null
        ]);
    }
}
