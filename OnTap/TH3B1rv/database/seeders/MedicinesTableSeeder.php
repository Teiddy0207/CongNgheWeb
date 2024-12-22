<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            DB::table('medicines')->insert([
                'name' => $faker->word(),
                'brand' => $faker->company(),
                'dosage' => $faker->randomElement(['500mg tablets', '200mg capsules', '10ml syrup']),
                'form' => $faker->randomElement(['Viên nén', 'Viên nang', 'Xi-rô']), // Dạng thuốc
                'price' => $faker->randomFloat(2, 1000, 50000), // Giá thuốc (từ 1000 đến 50000)
                'stock' => $faker->numberBetween(10, 500), // Số lượng tồn (10 - 500)
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
    }
}
