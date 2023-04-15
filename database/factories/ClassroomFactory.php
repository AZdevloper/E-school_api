<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classroom>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'name' => fake()->name(),
            
            'NumberOfStudent' => fake()->randomNumber(),
            'teacher_id' => User::factory(),
            'subject_id'=> Subject::factory(),
            
            // 'admin_id' => User::factory(),
        ];
    }
}
