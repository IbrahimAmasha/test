<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class TrainerCourses extends Component
{

    public $courses;

    public function mount()
    {
        if (auth()->check()) {
            $trainer = auth()->user()->trainer;
    
            if ($trainer && $trainer->user->role_id == 2) {
                $this->courses = $trainer->courses;
            } else {
                session()->flash('error', 'You are not authorized to view this page.');
            }
        } else {
            return redirect()->route('login');
        }
    }
    

    public function render()
    {
        return view('livewire.trainers.trainer-courses');
    }
}
