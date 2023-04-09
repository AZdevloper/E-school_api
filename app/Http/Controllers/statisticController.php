<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Absence;
use App\Models\Classroom;
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
    public function getIncomingEventsCount()
    {
        $now = now()->toDateString(); // get today's date in the format 'YYYY-MM-DD'
        return Event::where('date', '>=', $now)->orderBy('date')->count();
    }
    public function getAbsenceCount()
    {
        $now = now()->toDateString(); // get today's date in the format 'YYYY-MM-DD'
        return Absence::where('date', '>=', $now)->orderBy('date')->count();
    }
    public function adminDashboard(){
        $teachersNumber = $this->teachersCount();
        $studentsNumber = $this->studentsCount();
        $classroomNumber = $this->classroomCount();
        $eventNumber = $this->eventCount();
        // $incomingEvents = $this->getIncomingEvents();
        $incomingEventsCount = $this->getIncomingEventsCount();
        $absenceCount = $this->getAbsenceCount();
        // return json response
        return response()->json([
           [ 
            'teachers' => $teachersNumber,
            'students' => $studentsNumber,
            'classes' => $classroomNumber,
            'events' => $eventNumber,
            // 'incomingEvents' => $incomingEvents,
            'incomingEventsCount' => $incomingEventsCount,
            // 'absenceCount' => $absenceCount
            ]
        ]);

    }
}
