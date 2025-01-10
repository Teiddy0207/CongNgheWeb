<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Lấy danh sách ID của các cửa hàng đã tồn tại
        $storeIds = DB::table('stores')->pluck('id');

        foreach ($storeIds as $storeId) {
            for ($i = 0; $i < rand(2, 5); $i++) {
                DB::table('products')->insert([
                    'store_id' => $storeId,
                    'name' => $faker->word(),
                    'description' => $faker->sentence(),
                    'price' => $faker->randomFloat(2, 10, 1000),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    
    }
}
