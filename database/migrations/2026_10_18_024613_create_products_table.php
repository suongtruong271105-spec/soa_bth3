<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id(); // Sinh ra kiểu bigint PK[cite: 2]
        $table->string('name'); // Tên sản phẩm[cite: 2]
        $table->text('description')->nullable(); // Mô tả[cite: 2]
        $table->decimal('price', 10, 2); // Giá[cite: 2]
        $table->integer('quantity'); // Số lượng[cite: 2]
        $table->timestamps(); // Sinh ra created_at và updated_at[cite: 2]
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
