<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**

 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>

 */
class EventFactory extends Factory
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
            'description' => fake()->shuffleString(),
            'user_id' => User::factory(),  

        ];
    }
}
