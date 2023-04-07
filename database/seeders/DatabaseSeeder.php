<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AbsenceSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            DailyActivitySeeder::class,

            EventSeeder::class,
            HomeWorkSeeder::class,
            ResultSeeder::class,
            FeedbackSeeder::class,
            ClassroomSeeder::class,
            RolesAndPermissionsSeeder::class,
            AbsenceSeeder::class


        ]);
    }
}
