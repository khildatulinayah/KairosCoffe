<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('title', 255);
            $table->string('author', 150)->nullable();
            $table->text('description')->nullable();
            $table->string('cover', 255)->nullable();
            $table->integer('stock')->default(0);
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('book_categories')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};

