<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class statisticController extends Controller
{
    //
    public function teachersCount(){
        $teachersNumber = User::whereHas('roles', function ($query) {
            $query->where('name', 'teacher');
        })->count();

        return $teachersNumber;
    }

    public function studentsCount()
    {
        $studentsNumber = User::whereHas('roles', function ($query) {
            $query->where('name', 'student');
        })->count();

        return $studentsNumber;
    }
    public function classroomCount()
    {
        $classroomNumber = Classroom::all()->count();

        return $classroomNumber;
    }
    public function eventCount()
    {
        $eventNumber = Event::all()->count();

        return $eventNumber;
    }
    public function getIncomingEvents()
    {
        $now = now()->toDateString(); // get today's date in the format 'YYYY-MM-DD'
        return Event::where('date', '>=', $now)->orderBy('date')->get();
    }
}
