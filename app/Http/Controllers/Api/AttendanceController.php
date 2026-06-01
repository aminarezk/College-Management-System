<?php

namespace App\Http\Controllers\Api;

use App\Attendance;
use App\Http\Controllers\Controller;
use App\Http\Resources\AttendanceResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $att = AttendanceResource::collection(Attendance::all());
        return response()->json([
            'mesg' => 'All attendance',
            'data' => $att
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
            'week' => 'required',
            'status' => 'required',
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
        $att = Attendance::create($data);
        return response()->json([
            'mesg' => 'Created att',
            'data' => $att
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
        $att = Attendance::findorfail($id);
        if (!$att) {
            return response()->json([
                'mesg' => 'No such data',
                'data' => null
            ]);
        }
        return response()->json([
            'mesg' => 'one attendance',
            'data' => $att
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
        $att = Attendance::findorfail($id);
        if (!$att) {
            return response()->json([
                'mesg' => 'No such data',
                'data' => null
            ]);
        }
        $validtor = Validator::make($request->all(), [
            'subject_id' => 'required',
            'user_id' => 'required',
            'week' => 'required',
            'status' => 'required',
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
        $result = $att->update($data);
        return response()->json([
            'mesg' => 'Updated att',
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
        $att = Attendance::findorfail($id);
        if (!$att) {
            return response()->json([
                'mesg' => 'No such data',
                'data' => null
            ]);
        }
        $att->delete();
        return response()->json([
            'mesg' => 'Deleted att',
            'data' => null
        ]);
    }
}
