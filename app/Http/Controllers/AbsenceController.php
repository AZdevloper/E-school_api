<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\Resources\Json\JsonResource;

class AbsenceController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $absence = Absence::with([
            'student' ,
            'teacher', 'subject'
        ])->get();
        return $absence;
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
            'date' => 'date_format:Y-m-d',
            'absenceHours' => 'required|integer',
            'student_id' => 'required|integer',
            
            'teacher_id' => 'required|integer', 
            'subject_id'=> 'required|integer',
          
        ]);
        $absence = new Absence([
            
            'date' => $request->date,
            'absenceHours' => $request->absenceHours,
            'student_id' => $request->student_id,
            'teacher_id' => $request->teacher_id,
            'subject_id' => $request->subject_id
        ]);

        $absence->save();

        return response([
            'message' => "new absence added successfully",

        ],
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $absence = Absence::findOrFail($id);
        if ($absence) {
            return $absence;
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
        $absence = Absence::findOrFail($id);
        if ($absence) {

            $request->validate([
                
                'date' => 'date_format:Y-m-d',
                'absenceHours' => 'required|integer',
                'student_id' => 'required|integer',
                'teacher_id' => 'required|integer', 
                'subject_id'=> 'required|integer',

            ]);

            $absence->update([
                'date' => $request->date,
                'absenceHours' => $request->absenceHours,
                'student_id' => $request->student_id,
                'teacher_id' => $request->teacher_id,
                'subject_id' => $request->subject_id
            ]);
            return $absence;
        } else {

            return response()->json([
                'message' => 'event not found'
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
        $absence = Absence::findOrFail($id);
        if ($absence) {
            $absence->delete();
            return new JsonResource(["message" => "delete successfully"], 202);
        } else {
            return new JsonResource(["message" => "not found"], 404);
        }
    }
    
}
