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
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // Khóa ngoại đến orders
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Khóa ngoại đến users
            $table->decimal('amount', 10, 2); // Số tiền thanh toán
            $table->enum('method', ['cash', 'credit_card', 'momo', 'zalopay']); // Phương thức thanh toán
            $table->enum('status', ['pending', 'success', 'failed'])->default('pending'); // Trạng thái giao dịch
            $table->string('transaction_id')->nullable(); // Mã giao dịch (nếu có)
            $table->timestamps(); // created_at & updated_at
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
