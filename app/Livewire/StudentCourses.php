<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class StudentCourses extends Component
{
    public $courses = [];

    public function mount()
    {
        $user = auth()->user();

        if ($user->role_id == 3) {

            if ($user->student) {
                $this->courses = $user->student->courses;
            } else {
                $this->courses = [];
            }
        }
    }

    public function render()
    {
        return view('livewire.students.student-courses');
    }
}
