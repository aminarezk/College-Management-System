<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubjectResource;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub = SubjectResource::collection(Subject::all());
        return response()->json([
            'mesg' => 'All subjects',
            'data' => $sub
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
            'name' => 'required',
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
        $sub = Subject::create($data);
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
        $sub = Subject::findorfail($id);
        if (!$sub) {
            return response()->json([
                'mesg' => 'No such data',
                'data' => null
            ]);
        }
        return response()->json([
            'mesg' => 'one subject',
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
        $sub = Subject::findorfail($id);
        if (!$sub) {
            return response()->json([
                'mesg' => 'No such data',
                'data' => null
            ]);
        }
        $validtor = Validator::make($request->all(), [
            'name' => 'required'
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
            'mesg' => 'Updated subject',
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
        $sub = Subject::findorfail($id);
        if (!$sub) {
            return response()->json([
                'mesg' => 'No such data',
                'data' => null
            ]);
        }
        $sub->delete();
        return response()->json([
            'mesg' => 'Deleted subject',
            'data' => null
        ]);
    }
}
