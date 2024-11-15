<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['user_id'];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments', 'student_id', 'course_id');
    }

 

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
