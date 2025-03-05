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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Khóa ngoại đến categories
            $table->string('name', 255); // Tên món ăn
            $table->text('description')->nullable(); // Mô tả món ăn (có thể để trống)
            $table->decimal('price', 10, 2); // Giá món ăn
            $table->string('image', 255)->nullable(); // Ảnh món ăn
            $table->enum('status', ['available', 'unavailable'])->default('available'); // Trạng thái
            $table->timestamps(); // created_at & updated_at
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
