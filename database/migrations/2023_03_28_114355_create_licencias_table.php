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
        Schema::create('licencias', function (Blueprint $table) {
            $table->id();
           
            $table->string('Usuario');
            $table->string('clave');
            $table->date('fecha_compra');
            $table->date('fecha_expiracion');
            $table->foreignId('programa_id')->constrained('programas');
            $table->foreignId('ordenador_id')->constrained('ordenadores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licencias');
    }
};


// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::create('licencias', function (Blueprint $table) {
//             $table->id();
           
//             $table->string('Usuario');
//             $table->string('clave');
//             $table->date('fecha_compra');
//             $table->date('fecha_expiracion');
//             $table->foreignId('programa_id')->constrained('programas');
//             $table->foreignId('ordenador_id')->constrained('ordenadores');
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('licencias');
//     }
// };
