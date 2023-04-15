<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClassRoomCollection;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class ClassroomController extends Controller
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
        
        $user = Auth::user();
       
        if ($user->hasRole('admin')) {
            $classes = Classroom::all();
        } else {
            $classes = Classroom::with('teacher','subject')->where('teacher_id',$user->id)->get();
        }
        
       

        // return $classes;

        
        return new ClassRoomCollection($classes);
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
            'name' => 'required|string',
            'subjectName' => 'required|string',
            'teacherName' => 'required|string',
            'NumberOfStudent' => 'required|string',
            // 'user_id' => 'required',

        ]);
        $class = new Classroom([
            'name' => $request->name,
            'subjectName' => $request->subjectName,
            'teacherName' => $request->teacherName,
            'NumberOfStudent' => $request->NumberOfStudent,
            // 'user_id' => $request->user_id,
            
        ]);

        $class->save();

        return response([
            'message' => "new class added successfully",
            
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
        $class = Classroom::findOrFail($id);
        if ($class) {
            return $class;
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

        $class = Classroom::findOrFail($id);
        if ($class) {

            $request->validate([
                'name' => 'required|string',
                'subjectName' => 'required|string',
                'teacherName' => 'required|string',
                'NumberOfStudent' => 'required|numeric',
                // 'user_id' => 'required',

            ]);

            $class->update([
                'name' => $request->name,
                'subjectName' => $request->subjectName,
                'teacherName' => $request->teacherName,
                'NumberOfStudent' => $request->NumberOfStudent,
                // 'user_id' => $request->user_id,
            ]);
            return $class;

        } else {

            return response()->json([
                'message' => 'class not found'
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
        $class = classroom::findOrFail($id);
        if ($class) {
            $class->delete();
            return new JsonResource(["message" => "delete successfully"], 202);
        } else {
            return new JsonResource(["message" => "not found"], 404);
        }
    }
}
