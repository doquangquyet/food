<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy danh sách user_id có sẵn trong DB
        $userIds = DB::table('users')->pluck('id')->toArray();

        // Kiểm tra nếu có dữ liệu thì mới seed
        if (empty($userIds)) {
            return;
        }

        for ($i = 0; $i < 10; $i++) {
            DB::table('orders')->insert([
                'user_id' => $userIds[array_rand($userIds)], // Chọn user_id ngẫu nhiên
                'total_price' => round(mt_rand(500000, 5000000) / 100, 2), // Giá trị đơn hàng ngẫu nhiên (định dạng decimal)
                'status' => ['pending', 'processing', 'completed', 'cancelled'][rand(0, 3)], // Trạng thái đơn hàng
                'payment_status' => ['unpaid', 'paid'][rand(0, 1)], // Trạng thái thanh toán
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
