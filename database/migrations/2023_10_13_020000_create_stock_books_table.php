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
Schema::create('stock_books', function (Blueprint $table) {
$table->id('stock_book_id');
$table->string('title')->nullable();
$table->string('author')->nullable();
$table->string('isbn')->nullable();
$table->string('image')->nullable();
$table->timestamps();
});
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_books');
    }
};
