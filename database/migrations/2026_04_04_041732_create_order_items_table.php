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
    Schema::create('order_items', function (Blueprint $table) {
    $table->id();
    // Dòng này tự động hiểu order_id là unsignedBigInteger 
    // và tham chiếu đến cột id của bảng orders
    $table->foreignId('order_id')->constrained()->onDelete('cascade');
    $table->unsignedBigInteger('product_id'); // Ví dụ thêm cho sản phẩm
    $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
