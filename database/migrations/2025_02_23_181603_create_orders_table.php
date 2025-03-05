<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Khóa ngoại đến users
            $table->decimal('total_price', 10, 2); // Tổng tiền đơn hàng
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending'); // Trạng thái đơn hàng
            $table->enum('payment_status', ['unpaid', 'paid'])->default('unpaid'); // Trạng thái thanh toán
            $table->timestamps(); // created_at & updated_at
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
