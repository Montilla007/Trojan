<?php

// database/seeders/ClassroomSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classroom;
use App\Models\Teacher; // Import Teacher model if needed
use Illuminate\Support\Facades\DB;

class ClassroomSeeder extends Seeder
{
    public function run()
    {
        // Retrieve all teachers
        $teachers = Teacher::all();

        // Example data for classrooms
        $classrooms = [
            [
                'room_number' => 'Room 1',
                'occupancy_status' => 'occupied',
                'teacher_id' => $teachers->isNotEmpty() ? $teachers->random()->id : null,
                'description' => 'This classroom is occupied by Teacher A. This is the description for Teacher A\'s class.',
                'start_time' => now(),
                'end_time' => now()->addMinutes(2),
            ],
            [
                'room_number' => 'Room 2',
                'occupancy_status' => 'unoccupied',
                'teacher_id' => null,
                'description' => 'This classroom is currently unoccupied. No class is scheduled at the moment.',
                'start_time' => null,
                'end_time' => null,
            ],
            // Add more classrooms as needed
        ];

        // Populate the classrooms table
        foreach ($classrooms as $classroomData) {
            Classroom::create($classroomData);
        }
    }
}
