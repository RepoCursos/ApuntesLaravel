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
        Schema::create('equipo_partido', function (Blueprint $table) {
            $table->id();
            $table->enum('resultado', ["G", "E", "P"])->nullable();
            $table->integer('golesF')->nullable();
            $table->integer('golesE')->nullable();
            $table->enum('estado',["Pendiente","Pagado"])->default('Pendiente'); //Refleja el pago de la cancha de ese partido

            $table->foreignId('partido_id')->constrained('partidos')->onDelete('cascade');
            $table->foreignId('equipo_id')->constrained('equipos')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipo_partido');
    }
};
