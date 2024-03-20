<?php

namespace Database\Seeders;

use Database\Seeders\ClassroomSeeder;
use Database\Seeders\StudentSeeder;
use Database\Seeders\TeacherSeeder;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StudentSeeder::class,
            TeacherSeeder::class,
            ClassroomSeeder::class
            // Add more seeders here
        ]);
    }
}
