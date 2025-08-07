<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//TODOS LOS TIPOS QUE SE USAN PARA LOS DATOS
return new class extends Migration
{
    /**
     * ver video: https://www.youtube.com/watch?v=njvzNhF0ka4&list=PLDllzmccetSM50U0Y9fTOWHvSzAZ_W6Il&index=4
     *            https://www.youtube.com/playlist?list=PLX64KYDfSBMvxqMDVoYtzymAAnr_B7xbA
     */
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            //Tipos de columna disponibles
            //https://laravel.com/docs/10.x/migrations#creating-columns
            //https://laravel.com/docs/12.x/migrations#available-column-types
            //Las mas utilizadas
            $table->id();
            $table->foreignId('clave_id')->constrained('tabla Relacion')->onDelete('cascade'); //SI se usa SoftDeletes

            $table->boolean('boolean');
            $table->char('Indicar longitud->', 100);
            $table->string('name', 100);
            $table->text('description');
            $table->longText('description');
            $table->enum('estado', ['activo', 'inactivo']);

            $table->time('Hora');
            $table->date('Fecha');
            $table->dateTime('Fecha y hora');

            $table->decimal('importe', 8, 2);
            $table->integer('votes');
            $table->float('float', 8, 2);
            $table->double('double', 8, 2);

            $table->ipAddress('visitor');
            $table->macAddress('device');
            $table->json('options');
            
            $table->softDeletes();
            $table->timestamps();
            
            //Reglas de validacion
            //https://laravel.com/docs/12.x/validation#available-validation-rules
            $table->string('Campos con reglas')->required()->nullable();//Etc.
            
            //Como modificar de la configuracion de base de datos MySql y MariaDB
            /* Motores de almacenamiento */
            /* InnoDB: Motor por defecto en MySQL y MariaDB.
    								  Soporta transacciones (BEGIN, COMMIT, ROLLBACK)
											Soporta claves foráneas (FOREIGN KEY)
											Maneja bloqueo a nivel de fila (más eficiente en concurrencia)*/
											
            $table->engine = 'InnoDB'; //Defaullt MySql
            
            /* Codificaciones de caracteres (collations y charsets) */
            /* chartset:
            			utf8mb4:Codificación completa de Unicode (hasta 4 bytes), soporta todos los emojis y símbolos. */
            	
            $table->chartset = 'utf8mb4'; //Defaullt MySql
            
            /* Collations: Controlan cómo se comparan y ordenan los textos
            			utf8_general_ci: Comparación insensible a mayúsculas.
									utf8mb4_unicode_ci: Comparación según reglas Unicode.	
            */
            $table->collaction = 'utf8_general_ci'; //Defaullt MySql
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
