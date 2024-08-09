<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
use App\Models\Material;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CourseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Course::factory(10)->create();
        $this->call([
            CourseSeeder::class,
        ]);
        Material::factory(70)->recycle([Course::all()])->create();

    }
}