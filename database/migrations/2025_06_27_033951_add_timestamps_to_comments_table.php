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
    Schema::table('comments', function (Blueprint $table) {
        $table->timestamps(); // ← agrega created_at y updated_at
    });
}

public function down(): void
{
    Schema::table('comments', function (Blueprint $table) {
        $table->dropTimestamps();
    });
}

};
