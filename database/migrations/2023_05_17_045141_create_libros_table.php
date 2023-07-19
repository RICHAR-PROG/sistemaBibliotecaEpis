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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('dewey');
            $table->string('titulo');
            $table->string('autor');
            $table->date('fecha_edicion');
            $table->string('editorial');
            $table->date('fecha_adquisicion');
            $table->string('imagen');
            $table->string('genero');
            $table->string('formato');
            $table->integer('stock')->nullable();
            $table->text('PDF')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
