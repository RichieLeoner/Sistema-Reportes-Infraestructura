<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('location'); // Aula, Laboratorio, etc.
            $table->text('description');
            $table->enum('priority', ['baja', 'media', 'alta'])->default('media');
            $table->enum('status', ['pendiente', 'en_proceso', 'resuelto'])->default('pendiente');
            $table->string('photo_path')->nullable(); // Ruta de la foto
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};