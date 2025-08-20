Me estoy preparando para una entrevista en laravel, que es lo que necesito saber sobre migraciones ?

    /**
     * ver video: https://www.youtube.com/watch?v=njvzNhF0ka4&list=PLDllzmccetSM50U0Y9fTOWHvSzAZ_W6Il&index=4
     */

1.  **Beneficios Clave:**
    *   **Historial de Cambios:** 
    		Puedes ver cómo ha evolucionado el esquema de tu BD.
    *   `php artisan migrate:status`: Muestra el estado de cada migración (si se ha ejecutado o no).
  
    *   **Colaboración:** 
    		Todo el equipo trabaja con la misma estructura de BD. Si alguien añade una tabla o columna, los demás solo ejecutan 
    *   `php artisan migrate`: Ejecuta todas las migraciones pendientes (las que aún no se han corrido).
    *	`php artisan migrate --path=/database/migrations/MIGRACION_SELECCIONADA_table.php`:     
            Ejecuta la migracion pendiente (solo la elejida).
  
    *   **Estructura de un Archivo de Migración:**
    *   *   Crea un nuevo archivo de migración para crear una tabla.
    *	`php artisan make:migration create_nombre_tabla_table`
        Cada archivo de migración es una clase PHP que extiende `Illuminate\Database\Migrations\Migration`.
        Contiene dos métodos principales:
        *   `up()`: Define los cambios que se aplicarán a la base de datos (ej: crear tabla, agregar columna).
        Se ejecuta con `php artisan migrate`.

        *   `down()`: Define cómo revertir los cambios hechos en el método `up()` (ej: eliminar tabla, quitar columna). 
        Se ejecuta con `php artisan migrate:rollback`. Es crucial que este método revierta *exactamente* lo que hizo el `up()`.

    ```php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('posts', function (Blueprint $table) {
                $table->id(); // BigInt Unsigned Auto-Increment Primary Key
                $table->string('title');
                $table->text('content')->nullable();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->timestamps(); // created_at y updated_at (TIMESTAMPS)
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('posts');
        }
    };
    ```   

2.  **Comandos Esenciales de Artisan:**
    *   Crea un nuevo archivo de migración para crear una tabla.
    *	`php artisan make:migration create_nombre_tabla_table`
    ✅ Ejemplo:: 
    *	`php artisan make:migration create_posts_table --create=posts` 
    		(la opción `--create` sugiere la estructura básica para crear la tabla `posts`).

    ✅ Ejemplo agregar las columnas::
    *    Crea un nuevo archivo de migración para modificar una tabla
    *	`php artisan make:migration add_columna_to_nombre_tabla_table`: existente.
    *	`php artisan make:migration add_published_at_to_posts_table --table=posts` 
    	(la opción `--table` sugiere la estructura para modificar la tabla `posts`).

		Si quieres agregar las columnas published_at y status a la tabla posts, puedes crear una sola migración así
	*	`php artisan make:migration add_published_at_and_status_to_posts_table --table=posts`

    Luego, en el archivo de migración generado
    ```php
        public function up()
        {
            Schema::table('posts', function (Blueprint $table) {
                $table->timestamp('published_at')->nullable();
                $table->string('status')->default('draft');
            });
        }

        public function down()
        {
            Schema::table('posts', function (Blueprint $table) {
                $table->dropColumn(['published_at', 'status']);
            });
        }
    ```
     ✅ Ejemplo eliminar las columnas::
    *	`php artisan make:migration drop_published_at_to_posts_table --table=posts` 
    	(la opción `--table` sugiere la estructura para modificar la tabla `posts`).
        
		Si quieres eliminar las columnas published_at y status a la tabla posts, puedes crear una sola migración así
	*	`php artisan make:migration drop_published_at_and_status_to_posts_table --table=posts`

    Luego, en el archivo de migración generado
    ```php
        public function up()
        {
            Schema::table('posts', function (Blueprint $table) {
                    $table->dropColumn(['published_at', 'status']);
            });
        }

        public function down()
        {
            Schema::table('posts', function (Blueprint $table) {
                $table->timestamp('published_at')->nullable();
                $table->string('status')->default('draft');
            });
        }
    ```    

3.  **Reversibilidad:** 
    		Puedes deshacer cambios (rollback) si algo sale mal.
    *   `php artisan migrate:rollback`: Deshace la última "hornada" (batch) de migraciones.
    *   `php artisan migrate:rollback --step=X`: Deshace las últimas X migraciones.
    *   `php artisan migrate:rollback --batch=3`: Retrocede todas las migraciones en el lote 3
    *   `php artisan migrate:reset`: Deshace TODAS las migraciones. (¡Cuidado en producción!)
    *   `php artisan migrate:refresh`: Deshace todas las migraciones y las vuelve a ejecutar. (¡Cuidado, borra datos!)
    *   `php artisan migrate:refresh --step=X`: Deshace las últimas X migraciones y las vuelve a ejecutar. (¡Cuidado, borra datos!)
    *   `php artisan migrate:fresh`: Elimina TODAS las tablas de la base de datos y luego ejecuta todas las migraciones. (¡Aún más destructivo, borra datos!)
    *   `php artisan migrate:fresh --seed`: Igual que `fresh`, pero además ejecuta los seeders.

4.  **Schema Builder (Fachada `Schema` y clase `Blueprint`):**
    *   `Schema::create('nombre_tabla', function (Blueprint $table) { ... })`: Para crear una nueva tabla.
    *   `Schema::table('nombre_tabla', function (Blueprint $table) { ... })`: Para modificar una tabla existente.
    *   **Tipos de columnas comunes:**
        *   `$table->id();` (PK, auto-increment)
        *   `$table->string('nombre_columna', longitud);` (VARCHAR)
        *   `$table->text('nombre_columna');` (TEXT)
        *   `$table->integer('nombre_columna');`
        *   `$table->boolean('nombre_columna')->default(false);`
        *   `$table->date('nombre_columna');`
        *   `$table->timestamp('nombre_columna')->nullable();`
        *   `$table->timestamps();` (crea `created_at` y `updated_at`)
        *   `$table->softDeletes();` (crea `deleted_at` para borrado lógico)
        *   `$table->foreignId('user_id')->constrained('users')->onDelete('cascade');` (Llave foránea)
    *   **Modificadores de columna:**
        *   `->nullable()`
        *   `->default($valor)`
        *   `->unique()`
        *   `->index()`
        *   `->after('otra_columna')` (para MySQL)
        *   `->comment('Un comentario para la columna')`
    *   **Operaciones comunes:**
        *   `$table->renameColumn('antiguo_nombre', 'nuevo_nombre');` (requiere `doctrine/dbal`)
        *   `$table->dropColumn('nombre_columna');`
        *   `$table->foreign('columna_fk')->references('id')->on('tabla_referenciada');`
        *   `$table->dropForeign(['columna_fk']);`

5.  **Buenas Prácticas:**
    *   **Migraciones Atómicas:** 
    Cada migración debe hacer un cambio lógico y pequeño. No agrupes la creación de 5 tablas y la modificación de 3 en una sola migración.
    *   **Nombres Descriptivos:** 
    El nombre del archivo de migración debe indicar claramente qué hace.
    *   **Método `down()` Sólido:** 
    Asegúrate de que el método `down()` revierta correctamente los cambios del `up()`. Pruébalo con `rollback`.
    *   **No Modificar Migraciones Antiguas (una vez en producción/compartidas):** 
    Si una migración ya se ha ejecutado en otros entornos o por otros desarrolladores, NO la modifiques. 
    En su lugar, crea una *nueva* migración para realizar los cambios necesarios. 
    Modificar migraciones antiguas puede causar inconsistencias graves.
    *   **Cuidado con Operaciones Destructivas:** 
    Si una migración implica pérdida de datos (ej: `dropColumn`), sé muy consciente de ello. 
    A veces es inevitable, pero hay que tenerlo claro.
    *   **Dependencias:** 
    Si una migración depende de otra (ej. una tabla con FK depende de la tabla principal), Laravel las ejecuta en orden cronológico 
    por el timestamp del nombre del archivo.
    
    Si nesecitas hacer modificaciones o ciertas operaciones avanzadas relacionadas con las migraciones y la manipulación de la base de datos
    en tablas ya existentes como: 
    * Inspeccionar esquemas de bases de datos.
		* Modificar columnas existentes sin perder datos.
		* Trabajar con metadatos de la base de datos.
    deberas instalar doctrine/dbal.
    **Doctrine:** proporciona una capa de abstracción sobre bases de datos
    Instalacion: composer require doctrine/dbal