<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentCollection;
use App\Models\User;
use App\Models\Classroom;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //if user is admin
        $user = Auth::user();
        $students = [];
        if ($user->hasRole('admin')) {
            $studentRole = Role::where('name', 'student')->first();
            $students = User::role($studentRole)->get();
        } else {
            $classroom = Classroom::with('teacher', 'subject', 'students')->where('teacher_id', $user->id)->first();
            if ($classroom) {
                $students = $classroom->students;
            }
        }
        return $students;
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',

        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole("student");
        $user->save();
        $user->classrooms()->attach($request->class_id);

        return response([
            'user' => $user,
            'id' => $user->id,
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
        $user = User::findOrFail($id);
        if ($user->hasRole('student')) {
            return $user;
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
        $user = User::findOrFail($id);
        if ($user->hasRole('student')) {

            $request->validate([
                'name' => 'string',
                'email' => 'email|unique:users,email,' . $user->id,
                "class_id"=>'required'
            ], [
                'class_id.required' => 'The class field is required.']);
// validate request password if not null 
            if ($request->password){
                $request->validate([
                    'password' => 'min:8|confirmed',
                ]);
                $user->password = Hash::make($request->password);
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->update();
            $user->classrooms()->sync($request->class_id);
            return response()->json([
                "id"=>$user->id,
                'message' => 'User updated successfully'
            ], 200);

        } else {

            return response()->json([
                "id"=>$user->id,
                'message' => 'User not found'
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
        $user = User::findOrFail($id);
        if ($user->hasRole('student')) {
            $user->delete();
            return new JsonResource(["message" => "$user->name : delete successfully"], 202);
        } else {
            return new JsonResource(["message" => "not found"], 404);
        }
    }
}
