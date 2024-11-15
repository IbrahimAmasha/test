<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Trainer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Admin Seeder
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'phone' => '01029524081',
            'role_id' => 1, // Admin role
            'password' => bcrypt('password'),
        ]);

        // Trainer Seeder
        $trainerUser = User::create([
            'name' => 'Trainer',
            'email' => 'trainer@trainer.com',
            'phone' => '01029524082',
            'role_id' => 2, // Trainer role
            'password' => bcrypt('password'),
        ]);

        Trainer::create([
            'user_id' => $trainerUser->id,
            'specialization' => 'Fitness Trainer',
            'bio' => 'Experienced fitness trainer.',
        ]);

        // Student Seeder
        $studentUser = User::create([
            'name' => 'Student',
            'email' => 'student@student.com',
            'phone' => '01029524083',
            'role_id' => 3, // Student role
            'password' => bcrypt('password'),
        ]);

        Student::create([
            'user_id' => $studentUser->id,
        ]);
    }
}
