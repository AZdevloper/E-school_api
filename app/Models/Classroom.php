<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        "subjectName",
        "teacherName",
        "NumberOfStudent",
        "user_id",

    ];
  
    public function students()
    {
        return $this->belongsToMany(User::class, 'classroom_user','classroom_id','student_id');
    }
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
