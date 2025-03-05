<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy danh sách user_id và product_id có sẵn trong DB
        $userIds = DB::table('users')->pluck('id')->toArray();
        $productIds = DB::table('products')->pluck('id')->toArray();

        // Kiểm tra nếu có dữ liệu thì mới seed
        if (empty($userIds) || empty($productIds)) {
            return;
        }

        for ($i = 0; $i < 20; $i++) {
            DB::table('carts')->insert([
                'user_id' => $userIds[array_rand($userIds)], // Chọn user_id ngẫu nhiên
                'product_id' => $productIds[array_rand($productIds)], // Chọn product_id ngẫu nhiên
                'quantity' => rand(1, 5), // Số lượng sản phẩm từ 1 đến 5
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
