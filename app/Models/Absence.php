<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'absenceHours',
        'student_id',
        'teacher_id',
        'subject_id',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id')->select(['id', 'name']);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id')->select(['id', 'name']);
    }


}
