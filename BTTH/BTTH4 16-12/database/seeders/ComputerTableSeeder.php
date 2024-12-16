<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class ComputerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for($i = 0; $i < 10; $i++)
        {
         DB::table('computers')->insert([
            'computers_name' => $faker->unique()->regexify('Lab[1-9]-PC[0-9]{2}'),
            'model' => $faker->randomElement(['Dell Optiplex 7090', 'HP ProDesk 400', 'Lenovo ThinkCentre M720']),
            'operating_system' => $faker->randomElement(['Windows 10 Pro', 'Windows 11', 'Ubuntu 20.04']),
            'processor' => $faker->randomElement(['Intel Core i5-11400', 'Intel Core i7-11700', 'AMD Ryzen 5 5600G']),
            'memory' => $faker->randomElement([8, 16, 32, 64]),
            'available' => $faker->boolean(80), // 80% máy tính hoạt động
            'created_at' => now(),
            'updated_at' => now(),
         ]);
        }
    }
}
