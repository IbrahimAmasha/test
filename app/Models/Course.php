<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['title', 'description'];

    // Relationship with the User (Trainer)
    public function trainers()
    {
        return $this->belongsToMany(Trainer::class, 'course_trainer');
    }
    // Relationship with CourseContent
    public function content()
    {
        return $this->hasMany(CourseContent::class);
    }

    // Relationship with Assignment
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments', 'course_id', 'student_id');
    }
}
