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
        Schema::create('results', function (Blueprint $table) {
            $table->id('id_resultado');

            $table->unsignedBigInteger('id_paciente');
            $table->foreign('id_paciente')->references('id_paciente')->on('patients')->onUpdate('cascade');

            $table->unsignedBigInteger('id_prueba');
            $table->foreign('id_prueba')->references('id_prueba')->on('medical_tests')->onUpdate('cascade');

            $table->date('fecha_resultado');
            $table->string('resultado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
