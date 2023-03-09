<?php

namespace Database\Seeders;

use App\Models\HomeWork;
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
        HomeWork::factory()->count(5)->create();
    }
}
