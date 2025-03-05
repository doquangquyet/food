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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // Khóa ngoại đến orders
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Khóa ngoại đến products
            $table->unsignedInteger('quantity'); // Số lượng sản phẩm
            $table->decimal('price', 10, 2); // Giá tại thời điểm mua
            $table->timestamps(); // created_at & updated_at
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
