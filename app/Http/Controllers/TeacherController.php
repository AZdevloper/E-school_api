<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class TeacherController extends Controller
{
    //
    public function index()
    {
        $teacherRole = Role::where('name', 'teacher')->first();
        $teachers = User::role($teacherRole)->get();

        return response()->json(['teachers' => $teachers], 200);
    }
}
