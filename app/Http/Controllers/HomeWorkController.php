<?php

namespace App\Http\Controllers;

use App\Models\Home_work;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\HomeWorkResource;
use App\Http\Resources\HomeWorkCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $authTeacher = Auth::user();
        $homeWorks = Home_work::where('teacher_id',$authTeacher->id)->get();

        // return response()->json(new HomeWorkCollection($homeWorks))->withoutWrapping();
        // return $homeWorks;  
        return new HomeWorkCollection($homeWorks);
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
      $teacher_id =  Auth::user()->id;

        // return new JsonResource(["message" => Auth::user()]);
        
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'deadline'
            => [
                'required',
                
                'after:now',
            ],
                             
            

        ]);
        $homework = new Home_work([
            'title' => $request->title,
            'content' => $request->content,
            'deadline' => $request->deadline,
            'teacher_id' => $teacher_id,

        ]);

        $homework->save();

        return response([
            'message' => "new homework added successfully",

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
        $authTeacher = Auth::user();
       
        $homeWork = Home_work::where('teacher_id',$authTeacher->id)->where('id',$id)->first();
        
        if ($homeWork) {
            return $homeWork;
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
        $homeWork = Home_work::findOrFail($id);
        if ($homeWork) {

            $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'deadline'=> ['required','after:now'],
            ]);

            $homeWork->update([
                'title' => $request->title,
                'content' => $request->content,
                'deadline' => $request->deadline,
                'teacher_id' => Auth::user()->id,
            ]);
            return $homeWork;
        } else {

            return response()->json([
                'message' => 'homeWok  not found'
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
        $homeWork = Home_work::findOrFail($id);
        if ($homeWork) {
            $homeWork->delete();
            return new JsonResource(["message" => "delete successfully"], 202);
        } else {
            return new JsonResource(["message" => "not found"], 404);
        }
    }
}
