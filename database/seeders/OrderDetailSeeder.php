<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy danh sách order_id và product_id có sẵn trong DB
        $orderIds = DB::table('orders')->pluck('id')->toArray();
        $productIds = DB::table('products')->pluck('id')->toArray();

        // Kiểm tra nếu có dữ liệu thì mới seed
        if (empty($orderIds) || empty($productIds)) {
            return;
        }

        for ($i = 0; $i < 10; $i++) {
            $quantity = rand(1, 5);
            $price = round(mt_rand(100000, 1000000) / 100, 2); // Giá từ 1000.00 đến 10000.00

            DB::table('order_details')->insert([
                'order_id' => $orderIds[array_rand($orderIds)], // Chọn order_id ngẫu nhiên
                'product_id' => $productIds[array_rand($productIds)], // Chọn product_id ngẫu nhiên
                'quantity' => $quantity, // Số lượng ngẫu nhiên từ 1-5
                'price' => $price, // Giá tại thời điểm mua
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
