<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Course::factory(25)->create();
        Course::create([
            'title' => 'Tutorial Laravel 10 Untuk Pemula',
            'slug' => 'tutorial-laravel-10-untuk-pemula',
            'description' => 'Tutorial ini adalah khusus pemula yang ingin mempelacari Framework Laravel versi 10',
            'duration' => '8',
        ]);
    }
}