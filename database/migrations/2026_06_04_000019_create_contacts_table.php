<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('subject', 255)->nullable();
            $table->text('message')->nullable();
            $table->timestamp('created_at')->nullable();

            // Laravel timestamps expected, but your SQL only defines created_at.
            // We'll still keep updated_at out to match SQL better.
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};

