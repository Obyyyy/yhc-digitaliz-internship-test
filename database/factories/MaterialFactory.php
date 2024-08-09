<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Material>
 */
class MaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_id' => Course::factory(),
            'title' => fake()->sentence(2),
            'description' => fake()->paragraph(3, false),
            'link' => fake()->randomElement(['https://www.youtube.com/embed/Y_6TuCBS6EE', 'https://www.youtube.com/embed/T1TR-RGf2Pw', 'https://www.youtube.com/embed/Zw6kc6dd7Dc',  'https://www.youtube.com/embed/4D7wQiHidDw']),
        ];
    }
}