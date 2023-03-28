<?php

namespace Database\Seeders;

use App\Models\HomeWork;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


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
