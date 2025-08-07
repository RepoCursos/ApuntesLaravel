<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//ESTE METODO ES UN EJEMPLO DE USO PARA ELIMINAR UNA TABLA DE UNA DB EXISTENTE 
//CUANDO ESTAMOS EN PRODUCCION

return new class extends Migration
{
    /**
     * Elimina la tabla si existe
     */
    public function up(): void
    {
        Schema::dropIfExists('paises');
    }

    /**
     * Crea la tabla que fue eliminada, tiene que tener el mismo esquema de cuando se creo por 
     * mas de que luego se hallan agregado nuevas columnas.
     * IMPORTANTE: esto borra los datos que existian en la base de datos
     */
    public function down(): void
    {
        Schema::create('paises', function (Blueprint $table) {
            $table->id();
            $table->string('pais', 100);
            $table->timestamps();
        });
    }
};
