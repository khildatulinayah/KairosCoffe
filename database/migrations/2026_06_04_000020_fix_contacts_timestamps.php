<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            // Pastikan kolom updated_at ada (SQL acuan kamu hanya defines created_at).
            if (!Schema::hasColumn('contacts', 'updated_at')) {
                $table->timestamp('updated_at')->nullable();
            }

            if (!Schema::hasColumn('contacts', 'created_at')) {
                $table->timestamp('created_at')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            if (Schema::hasColumn('contacts', 'updated_at')) {
                $table->dropColumn('updated_at');
            }
        });
    }
};

