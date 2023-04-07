<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Absence>
 */
class AbsenceFactory extends Factory
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
            'date' => fake()->dateTimeBetween($startDate = 'now', $endDate = '+1 year', $timezone = null),
            'absenceHours' =>
            fake()->numberBetween(1,8),
            'student_id' => User::factory(),
            'teacher_id' => User::factory(),
            'subject_id' => Subject::factory(),
        ];
    }
}
