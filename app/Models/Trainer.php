<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = ['user_id' , 'specialization' , 'bio'] ;

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_trainer', 'trainer_id', 'course_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
