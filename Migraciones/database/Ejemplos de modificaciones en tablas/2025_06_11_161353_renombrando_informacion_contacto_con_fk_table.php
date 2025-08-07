<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Estamos renombrando una tabla con FK
     */
    public function up(): void
    {
        //Paso 1-Eliminamos los constrain para que no quede vinculado el id
        Schema::table('informacion_contacto', function (Blueprint $table) {
            $table->dropForeign(['plataforma_id']);
        });

        //Paso 2- Renombramos la tabla
        Schema::rename('informacion_contacto', 'contacto_plataforma');

        //Paso 3- Agregamos de nuevo la/s FK
        Schema::table('contacto_plataforma', function (Blueprint $table) {
            $table->foreign('plataforma_id')->references('id')->on('plataformas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Paso 1: Eliminar la FK
        Schema::table('contacto_plataforma', function (Blueprint $table) {
            $table->dropForeign(['plataforma_id']);
        });

        // Paso 2: Renombrar la tabla de nuevo
        Schema::rename('contacto_plataforma', 'informacion_contacto');

        // Paso 3: Volver a agregar la FK
        Schema::table('informacion_contacto', function (Blueprint $table) {
            $table->foreign('plataforma_id')->references('id')->on('plataformas')->onDelete('cascade');
        });
    }
};
