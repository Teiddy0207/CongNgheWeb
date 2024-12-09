<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LaptopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $renterIds = DB::table('renters')->pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) { 
            DB::table('laptops')->insert([
                'brand' => $faker->randomElement(['Dell', 'HP', 'Lenovo', 'Apple', 'Asus']), // Hãng laptop ngẫu nhiên
                'model' => $faker->bothify('??###'), 
                'specifications' => $faker->randomElement([
                    'i5, 8GB RAM, 256GB SSD',
                    'i7, 16GB RAM, 512GB SSD',
                    'i3, 4GB RAM, 128GB SSD',
                    'Ryzen 5, 8GB RAM, 1TB HDD',
                ]), 
                'rental_status' => $faker->boolean(50), // Trạng thái thuê: 50% là đang thuê
                'renter_id' => $faker->optional(0.5)->randomElement($renterIds), // Gán ngẫu nhiên renter_id hoặc null (50% xác suất)
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}


