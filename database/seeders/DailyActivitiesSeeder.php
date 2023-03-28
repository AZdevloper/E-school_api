<?php

namespace Database\Seeders;

use App\Models\DailyActivities;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DailyActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DailyActivities::factory()->count(5)->create();
    }
}
