<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy danh sách order_id và user_id có sẵn trong DB
        $orderIds = DB::table('orders')->pluck('id')->toArray();
        $userIds = DB::table('users')->pluck('id')->toArray();

        // Kiểm tra nếu có dữ liệu thì mới seed
        if (empty($orderIds) || empty($userIds)) {
            return;
        }

        $methods = ['cash', 'credit_card', 'momo', 'zalopay'];
        $statuses = ['pending', 'success', 'failed'];

        for ($i = 0; $i < 10; $i++) {
            $amount = round(mt_rand(50000, 2000000) / 100, 2); // Số tiền từ 500.00 đến 20000.00
            $method = $methods[array_rand($methods)]; // Phương thức thanh toán ngẫu nhiên
            $status = $statuses[array_rand($statuses)]; // Trạng thái giao dịch ngẫu nhiên
            $transactionId = $status === 'success' ? 'TXN' . strtoupper(bin2hex(random_bytes(5))) : null;

            DB::table('payments')->insert([
                'order_id' => $orderIds[array_rand($orderIds)], // Chọn order_id ngẫu nhiên
                'user_id' => $userIds[array_rand($userIds)], // Chọn user_id ngẫu nhiên
                'amount' => $amount, // Số tiền thanh toán
                'method' => $method, // Phương thức thanh toán
                'status' => $status, // Trạng thái giao dịch
                'transaction_id' => $transactionId, // Mã giao dịch nếu thành công
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
