<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        User::factory()->count(2)->create()->each(function ($user) {
            $user->assignRole('admin');
        });

        User::factory()->count(2)->create()->each(function ($user) {
            $user->assignRole('teacher');
        });
         User::factory()->count(2)->create()->each(function ($user) {
            $user->assignRole('student');
        });
    }
}
