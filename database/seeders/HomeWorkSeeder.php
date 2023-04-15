<?php

namespace Database\Seeders;

use App\Models\Home_work;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Home_work::factory()->count(3)->create();

    }
}
