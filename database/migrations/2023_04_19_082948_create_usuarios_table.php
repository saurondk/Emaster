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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_curso');
            $table->string('usuario')->unique();
            $table->string('contraseña');
            $table->string('codigo_curso');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->foreignId('aula_id')->constrained('aulas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
