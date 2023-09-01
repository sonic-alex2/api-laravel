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
        Schema::create('medical_tests', function (Blueprint $table) {
            $table->id('id_prueba');
            $table->string('nombre');
            $table->string('tipo')->comment('los tipos de prueba');
            $table->double('costo');
            $table->timestamp('tiempo_resultado');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_tests');
    }
};
