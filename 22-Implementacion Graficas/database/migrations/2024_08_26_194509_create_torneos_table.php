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
        Schema::create('torneos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->double('inscripcion',8,2);
            $table->double('valor_cancha',8,2);
            $table->date('fecha')->nullable();
            $table->string('ubicacion')->nullable();
            $table->integer('cant_equipos')->nullable();
            $table->string('premios')->nullable();
            $table->text('reglas_gral')->nullable();
            $table->text('sis_competicion')->nullable();
            $table->text('elegibilidad')->nullable();
            $table->text('disciplina')->nullable();
            $table->boolean('publicado')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('torneos');
    }
};
