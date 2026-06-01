<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MarkResource;
use App\Mark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mark = MarkResource::collection(Mark::all());
        return response()->json([
            'mesg' => 'All marks',
            'data' => $mark
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
            'subject_id' => 'required',
            'user_id' => 'required',
            'mark_value' => 'required',
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
        $mark = Mark::create($data);
        return response()->json([
            'mesg' => 'Created mark',
            'data' => $mark
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
        $mark = Mark::findorfail($id);
        if (!$mark) {
            return response()->json([
                'mesg' => 'No such data',
                'data' => null
            ]);
        }
        return response()->json([
            'mesg' => 'one mark',
            'data' => $mark
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
        $mark = Mark::findorfail($id);
        if (!$mark) {
            return response()->json([
                'mesg' => 'No such data',
                'data' => null
            ]);
        }
        $validtor = Validator::make($request->all(), [
            'subject_id' => 'required',
            'user_id' => 'required',
            'mark_value' => 'required',
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
        $result = $mark->update($data);
        return response()->json([
            'mesg' => 'Updated mark',
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
        $mark = Mark::findorfail($id);
        if (!$mark) {
            return response()->json([
                'mesg' => 'No such data',
                'data' => null
            ]);
        }
        $mark->delete();
        return response()->json([
            'mesg' => 'Deleted mark',
            'data' => null
        ]);
    }
}
