<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleTranslation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'trainer']);
        Role::create(['name' => 'student']);
    }
}
