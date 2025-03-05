<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingAddressSeeder extends Seeder
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

        $cities = ['Hà Nội', 'Hồ Chí Minh', 'Đà Nẵng', 'Hải Phòng', 'Cần Thơ'];
        $states = ['Ba Đình', 'Quận 1', 'Thanh Khê', 'Lê Chân', 'Ninh Kiều'];
        $zipCodes = ['100000', '700000', '550000', '180000', '900000'];

        for ($i = 0; $i < 10; $i++) {
            $randomIndex = rand(0, count($cities) - 1);

            DB::table('shipping_addresses')->insert([
                'user_id' => $userIds[array_rand($userIds)], // Chọn user_id ngẫu nhiên
                'address' => 'Số ' . rand(1, 200) . ', Đường ' . chr(rand(65, 90)) . ' ' . rand(1, 30), // Địa chỉ ngẫu nhiên
                'city' => $cities[$randomIndex], // Thành phố ngẫu nhiên
                'state' => $states[$randomIndex], // Tỉnh/Quận tương ứng
                'zip_code' => $zipCodes[$randomIndex], // Mã bưu điện tương ứng
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
