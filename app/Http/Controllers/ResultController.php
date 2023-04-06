<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\Resources\Json\JsonResource;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $results = Result::all();


        return $results;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'mark_obtained' => 'required|numeric',
            'student_id' => 'required|numeric',
            'teacher_id' => 'required|numeric',
            'subject_id' => 'required|numeric',

        ]);
        $Result = new Result([
            'mark_obtained' => $request->mark_obtained,
            'student_id' => $request->student_id,
            'teacher_id' => $request->teacher_id,
            'subject_id' => $request->subject_id,
            

        ]);

        $Result->save();

        return response([
            'message' => "new Result added successfully",

        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //
        $Result = Result::findOrFail($id);
        if ($Result) {
            return $Result;
        } else {
            return new JsonResource(["message" => "not found"], 404);
        }
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
        //
        $Result = Result::findOrFail($id);
        if ($Result) {

            $request->validate([
                
                
                'mark_obtained' => 'required|numeric|max:20|min:0',
                'student_id' => 'required|integer',
                'teacher_id' => 'required|integer',
                'subject_id' => 'required|integer',

            ],[
                'mark_obtained.required' => 'Please enter mark_obtained',
                'mark_obtained.numeric' => 'Please enter valid mark_obtained',
                'student_id.required' => 'Please enter student_id',
                'student_id.integer' => 'Please enter valid student_id',
                'teacher_id.required' => 'Please enter teacher_id',
                'teacher_id.integer' => 'Please enter valid teacher_id',
                'subject_id.required' => 'Please enter subject_id',
                'subject_id.integer' => 'Please enter valid subject_id',

            ]
            );

            $Result->update([
                'mark_obtained' => $request->mark_obtained,
                'student_id' => $request->student_id,
                'teacher_id' => $request->teacher_id,
                'subject_id' => $request->subject_id,
            ]);
            return $Result;
        } else {

            return response()->json([
                'message' => 'Result  not found'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $Result = Result::findOrFail($id);
        if ($Result) {
            $Result->delete();
            return new JsonResource(["message" => "delete successfully"], 202);
        } else {
            return new JsonResource(["message" => "not found"], 404);
        }
    }
}
