<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Lấy danh sách ID của các cửa hàng đã tồn tại
        $clubIds = DB::table('clubs')->pluck('id');

        foreach ($clubIds as $clubId) {
            for ($i = 0; $i < 9; $i++) {
                DB::table('players')->insert([
                    'club_id' => $clubId,
                    'name' => $faker->word(),
                    'position' => $faker->word(),
                    'number' => $faker->randomDigit(),
                    'birthday' => $faker->word(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
