<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Lấy danh sách ID của các cửa hàng đã tồn tại
        $postIds = DB::table('posts')->pluck('id');

        foreach ($postIds as $storeId) {
            for ($i = 0; $i < 20; $i++) {
                DB::table('comments')->insert([
                    'post_id' => $storeId,
                    'comment' => $faker->paragraph(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

    }
}
