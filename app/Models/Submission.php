<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = ['assignment_id', 'trainee_id', 'submission_file', 'submitted_at', 'grade', 'remarks'];

    // Relationship with Assignment
    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    // Relationship with User (Trainee)
    public function trainee()
    {
        return $this->belongsTo(User::class, 'trainee_id');
    }
}
