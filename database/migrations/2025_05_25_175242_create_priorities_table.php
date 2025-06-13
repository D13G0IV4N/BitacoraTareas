<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('priorities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->comment('Ej: Baja, Media, Alta');
            $table->integer('level')->comment('Orden interno (1,2,3…)');
            $table->string('color', 7)->comment('Hex para UI, p.ej. #FF5722');
            $table->softDeletes(); // Para borrado lógico
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('priorities');
    }
};
