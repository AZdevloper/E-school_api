<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home_work extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'deadline',
        'user_id',
    ];

}
