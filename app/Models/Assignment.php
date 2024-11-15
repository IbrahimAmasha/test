<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = ['course_id', 'title', 'description', 'due_date'];

    // Relationship with Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Relationship with Submissions
    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}
