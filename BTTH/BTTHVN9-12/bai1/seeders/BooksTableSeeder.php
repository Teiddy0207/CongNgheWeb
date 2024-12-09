<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $libraries = DB::table("libraries")->pluck('id');
        for ($i = 0; $i < 50; $i++) {
            DB::table('books')->insert([
                'title' => $faker->sentence(3), // Tên sách ngẫu nhiên
                'author' => $faker->name, // Tác giả ngẫu nhiên
                'publication_year' => $faker->year, // Năm xuất bản ngẫu nhiên
                'genre' => $faker->randomElement(['Programming', 'Science', 'History', 'Fiction']),
                'library_id' => $faker->randomElement($libraries), // Chọn ID thư viện ngẫu nhiên
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}

