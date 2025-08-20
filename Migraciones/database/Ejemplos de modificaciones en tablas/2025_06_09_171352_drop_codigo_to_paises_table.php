<?php
//Video: https://www.youtube.com/watch?v=IA1yfW9T4u4&list=PLX64KYDfSBMvxqMDVoYtzymAAnr_B7xbA&index=28
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * ELIMINAR COLUMNAS A UNA TABLA YA EXISTENTE A LA BASE DE DATOS ESTO ES UN EJEMPLO DE USO.
 * Estos metodo es para cuando estamos en produccion y necesitamos eliminar columnas "ALTER TABLE" en nuestra 
 * base de datos, lo realizamos de esta forma para no eliminar ningun registro de otras tablas.
 */
//EJECUTAMOS: php artisan migrate "ejecuta todas las migraciones pendientes"
// solo una migracion: php artisan migrate --path=/database/migrations/MIGRACION_SELECCIONADA_table.php

return new class extends Migration
{
    //Metodos si solo utilizamos ELOQUENT

    //Metodos para eliminar columnas a una tabla existente.
    public function up(): void
    {
        Schema::table('paises', function (Blueprint $table) {
            $table->dropColumn('codigo');
        });
    }

    //AGREGAR COLUMNAS ELIMINADAS, su utilizamos el comando rollback.
    public function down(): void
    {
        Schema::table('paises', function (Blueprint $table) {
            $table->string('codigo', 10);
        });
    }


    /*
    //Metodos si NO solo utilizamos ELOQUENT, es decir que la base de datos fue modificada directamente.
    //verificamos que las columnas existan o no.

    //Metodos para agregar columnas eliminadas.
    public function up(): void
    {
        //Este if verifica que en la tabla paises exista la columna codigo para luedo eliminarla, si no existe no hace nada
        if (Schema::hasTable('paises') && Schema::hasColumn('paises', 'codigo')) {
            Schema::table('paises', function (Blueprint $table) {
                $table->dropColumn('codigo');
            });
        }
    }

    //Metodos para eliminar columnas de una tabla existente, su utilizamos el comando rollback.
    public function down(): void
    {
        //Este if verifica que en la tabla paises exista la columna codigo para luedo eliminarla, si no existe no hace nada
        if (Schema::hasTable('paises') && Schema::hasColumn('paises', 'codigo') == false) {
            Schema::table('paises', function (Blueprint $table) {
                $table->string('codigo', 10);
            });
        }
    }
*/
};
