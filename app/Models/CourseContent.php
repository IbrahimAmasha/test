<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseContent extends Model
{
    protected $fillable = ['course_id', 'title', 'content_type', 'content_url', 'description'];

    // Relationship with Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
