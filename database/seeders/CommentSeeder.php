<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
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

        $comments = [
            'Sản phẩm rất tốt, chất lượng tuyệt vời!',
            'Giá hơi cao nhưng đáng tiền.',
            'Dịch vụ chăm sóc khách hàng rất tốt!',
            'Giao hàng nhanh, đóng gói cẩn thận.',
            'Sản phẩm không như mong đợi, cần cải thiện.',
            'Rất hài lòng với sản phẩm này!',
            'Chất lượng trung bình, có thể tốt hơn.',
            'Tuyệt vời! Sẽ mua lại lần sau.',
            'Hàng đúng mô tả, sẽ ủng hộ shop dài lâu.',
            'Tạm ổn, chưa thực sự xuất sắc.'
        ];

        for ($i = 0; $i < 15; $i++) {
            DB::table('comments')->insert([
                'user_id' => $userIds[array_rand($userIds)], // Chọn user_id ngẫu nhiên
                'product_id' => $productIds[array_rand($productIds)], // Chọn product_id ngẫu nhiên
                'comment' => $comments[array_rand($comments)], // Chọn nội dung bình luận ngẫu nhiên
                'rating' => rand(1, 5), // Đánh giá từ 1-5 sao
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
