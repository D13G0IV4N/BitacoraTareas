<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_id')
                  ->constrained('activities')
                  ->cascadeOnDelete();
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->cascadeOnDelete();
            $table->text('comment');
            $table->timestamp('commented_at')
                  ->useCurrent()
                  ->comment('Fecha de creación del comentario');
            $table->timestamp('edited_at')
                  ->nullable()
                  ->comment('Fecha de última edición');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
