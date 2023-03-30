<?php

namespace Database\Seeders;

use App\Models\DailyActivity;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DailyActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DailyActivity::factory()->count(5)->create();

    }
}
