<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Home_work>
 */
class Home_workFactory extends Factory
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
            'title' => fake()->title(),
            'content' => fake()->text(),
            'deadline' => fake()->date(),
            'teacher_id' => User::factory(),
        ];
    }
}
