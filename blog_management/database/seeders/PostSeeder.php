<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 0; $i < 10; $i++)
        {
            DB::table('posts')->insert([
                'title' => $faker -> word(),
                'content' => $faker -> paragraph(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
