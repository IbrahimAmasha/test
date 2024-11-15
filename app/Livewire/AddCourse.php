<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Trainer;
use Livewire\Component;

class AddCourse extends Component
{
    public $title;
    public $description;
    public $trainer_id = [];

    public function createCourse()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'trainer_id' => 'required|array|min:1',
        ]);

        $course = Course::create([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        $course->trainers()->attach($this->trainer_id); // Attach multiple trainers

        session()->flash('message', 'Course created successfully.');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admins.add-course');
    }
}
