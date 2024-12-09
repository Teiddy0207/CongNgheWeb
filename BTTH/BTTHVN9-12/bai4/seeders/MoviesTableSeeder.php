<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $cinemas = DB::table('cinemas')->pluck('id'); // Lấy danh sách id của các rạp chiếu

        for ($i = 0; $i < 50; $i++) {
            DB::table('movies')->insert([
                'title' => $faker->sentence(3), // Tên phim ngẫu nhiên
                'director' => $faker->name, // Đạo diễn ngẫu nhiên
                'release_date' => $faker->date(), // Ngày phát hành ngẫu nhiên
                'duration' => $faker->numberBetween(90, 180), // Thời gian phim ngẫu nhiên từ 90 đến 180 phút
                'cinema_id' => $faker->randomElement($cinemas), // Chọn rạp chiếu ngẫu nhiên
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
