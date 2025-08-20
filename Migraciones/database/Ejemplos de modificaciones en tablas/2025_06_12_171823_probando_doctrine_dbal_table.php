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
        Schema::create('probando_doctrine_dbal', function (Blueprint $table) {
            $table->id();
            $table->string('publicado', 100);
            $table->enum('estado', ['Activo', 'Inactivo']);
            $table->integer('stock');
            $table->double('precio', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('probando_doctrine_dbal');
    }
};
