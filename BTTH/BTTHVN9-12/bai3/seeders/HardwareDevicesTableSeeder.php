<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class HardwareDevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $centerIds = DB::table('it_centers')->pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) { // Tạo 50 thiết bị ngẫu nhiên
            DB::table('hardware_devices')->insert([
                'device_name' => $faker->word . ' ' . strtoupper($faker->lexify('??')) . $faker->randomNumber(2), // Tên thiết bị ngẫu nhiên
                'type' => $faker->randomElement(['Mouse', 'Keyboard', 'Headset']), 
                'status' => $faker->boolean(80), 
                'center_id' => $faker->randomElement($centerIds), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
