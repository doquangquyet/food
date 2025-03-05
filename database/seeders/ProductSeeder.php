<?php

namespace Database\Seeders;

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

        for ($i = 0; $i < 10; $i++) {
            DB::table('products')->insert([
                'category_id' => rand(1, 5),
                'name' => $faker->word(),
                'description' => $faker->sentence(),
                'price' => rand(100000, 500000),
                'image' => 'product' . ($i + 1) . '.jpg',
                'status' => ['available', 'unavailable'][rand(0, 1)],
            ]);
        }
    }
}
