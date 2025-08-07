<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Estamos renombrando una columna ya existente, se debe instalar doctrine/dbal
     * ATENCION: la columna no puede ser de tipo de dato 'enum', por que realiza el cambio 
     *           pero elimina la codificacion de 'enum' y deja la columna como string
     * Videos: https://www.youtube.com/watch?v=m3AI01D7gjk&list=PLX64KYDfSBMvxqMDVoYtzymAAnr_B7xbA&index=74
     */
    public function up(): void
    {
        Schema::table('probando_doctrine_dbal', function (Blueprint $table) {
            //Estos cambios son por que no tenemos indices
            // $table->renameColumn('publicado', 'publico'); //Cambiamos nombre de columna
            // $table->renameColumn('estado', 'situacion');  //Cambiamos nobre de columna pero esto elimina la codificacion de 'enum' y deja la columna como string
            // $table->text('publicado')->change(); //Cambiamos el tipo de dato de la columna, al estar aumentando la longitud de la columna no hay problema
            $table->string('publicado', 100)->nullable()->change(); //Cambiar el tipo de required a nullable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('probando_doctrine_dbal', function (Blueprint $table) {
            // $table->renameColumn('publico', 'publicado');
            // $table->renameColumn('situacion', 'estado');
            // $table->string('publicado', 100)->change(); //Cambiamos el tipo de dato de la columna al estado anterior, si tiene menos que la longitud indicada de caracteres no hay problema.
            //Pero si tuviera mas que la longitud indicada, perderiamos datos
            $table->string('publicado', 100)->nullable(false)->change(); //Cambiar el tipo de nullable a required
        });
    }
};
