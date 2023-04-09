<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
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
            'description' => Str::random(10),
            'date' => fake()->dateTimeBetween($startDate = 'now', $endDate = '+1 year', $timezone = null), 
            // 'user_id' => User::factory(), 
        ];
    }
}
