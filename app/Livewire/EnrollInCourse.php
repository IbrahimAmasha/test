<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class EnrollInCourse extends Component
{

    public $courses;

    public function mount()
    {
        $this->courses = Course::with('trainers')->get();
    }

    public function enroll($courseId)
    {
        $user = auth()->user();

        $student = $user->student;
    
        if ($student) {
            // Check if the student is already enrolled in the course
            if ($student->courses()->where('course_id', $courseId)->exists()) {
                session()->flash('error', 'You are already enrolled in this course.');
            } else {
                // Enroll the student in the course
                $student->courses()->attach($courseId);
                session()->flash('message', 'You have successfully enrolled in the course.');
            }
        } else {
            session()->flash('error', 'Student record not found.');
        }
    }
    

    public function render()
    {
        return view('livewire.students.enroll-in-course');
    }
}
