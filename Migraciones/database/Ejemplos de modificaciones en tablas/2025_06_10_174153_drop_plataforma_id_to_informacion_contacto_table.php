<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Forma de eliminar una clave foranea y su columna de una tabla ya creada y en produccion
 */
return new class extends Migration
{

    public function up(): void
    {
        Schema::table('informacion_contacto', function (Blueprint $table) {
            //Forma 1-el valor que tiene es el constrain
            /*  $table->dropForeign('informacion_contacto_plataforma_id_foreign');  */

            // Forma 2-el valor que tiene es el id dentro de un arreglo que apunta al constrain
            $table->dropForeign(['plataforma_id']);

            //Elimina la columna
            $table->dropColumn('plataforma_id');
        });
    }

    public function down(): void
    {
        if (Schema::hasTable('informacion_contacto') && Schema::hasColumn('informacion_contacto', 'plataforma_id') == false) {
            Schema::table('informacion_contacto', function (Blueprint $table) {
                $table->foreignId('plataforma_id')->after('email')->constrained('plataformas')->onDelete('cascade');
            });
        }
    }
};
