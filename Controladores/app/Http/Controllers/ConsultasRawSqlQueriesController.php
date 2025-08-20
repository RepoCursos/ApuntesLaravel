<?php

// =============================================================================
// 1. Realizando consultas con RAW SQL QUERIES 
// =============================================================================
// RAW SQL QUERIES: Son consultas crudas usando sentencias SQL
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

// SELECT con Raw SQL
/* Ejemplos simple de uso */
$users = DB::select('SELECT * FROM users WHERE active = ?', [1]);

// Usando parámetros nombrados
$users = DB::select('SELECT * FROM users WHERE created_at BETWEEN :start_date AND :end_date', 
                    [
                        'start_date' => '2024-01-01',
                        'end_date' => '2024-12-31'
                    ]);

// Query compleja con JOINs
$results = DB::select('SELECT u.name, u.email, p.title, c.name as category_name
                    FROM users u
                    INNER JOIN posts p ON u.id = p.user_id
                    INNER JOIN categories c ON p.category_id = c.id
                    WHERE u.active = ? AND p.published_at IS NOT NULL
                    ORDER BY p.created_at DESC
                    LIMIT ?', 
                    [1, 10]);

// Ejemplo caso de uso en un controlador
class RawSqlQueriesController extends Controller
{
    public function consulta($video)
    {
        //Metodo de consulta RAW SQL Queries
        //Consulta simple
        $videos = DB::select('SELECT * FROM videos');

        //Consulta con error, esta consulta tiene bulneravilidad por que la variable esta expuesta y puede inyectar codigo malicioso
        $video = DB::select("SELECT video, plataforma FROM videos WHERE id= $video");

        //Ahora si evitamos la inyeccion de datos con PreparedStatement que ayuda a proteger contra ataques de inyección SQL
        $video = DB::select("SELECT video, plataforma FROM videos WHERE id= ? ", [$video]);
        //otra forma mas explicita de declarar.
        $video = DB::select('SELECT video, plataforma FROM videos WHERE id= :unPK ', ['unPK' => $video]);
       
    }

//********************************************************************************************************** */

// INSERT con Raw SQL
DB::insert('INSERT INTO videos (video, plataforma, created_at, updated_at) 
            VALUES (?, ?, ?, ?)', ['RAW SQL Queries', 'Udemy', now(), now()]
            );

//Usando en el controlador con variables
    public function insertar()
    {
        //Creamos variables a modo ejemplo para insertar los datos.
        $video = 'Aprendiendo RAW SQL Queries';
        $plataforma = 'Udemy';

        $insercion = DB::insert('INSERT INTO videos (video, plataforma, created_at, updated_at) 
                                VALUES (?, ?, ?, ?)', [$video, $plataforma, now(), now()]
                    );
        dd($insercion);
    }

//********************************************************************************************************** */

// UPDATE con Raw SQL
$affected = DB::update('UPDATE users SET active = ? WHERE id = ?', [0, 5]);

//Usando en controlador
    public function actualizar($plataforma, $video)
    {
        //las variable plataforma y video tienen que estar en ese orde para que pueda actualizar los valores.
        // Ya que es el orden en el cual esta en la Route y que espera en la query 
        $actualizarDatos = DB::update(
            'UPDATE videos SET plataforma = ?, updated_at = ? WHERE id = ?',
            [$plataforma, now(), (int) $video]
        );

        //Otra forma mas explicita de declarar.
        $actualizarDatos = DB::update(
            'UPDATE videos SET plataforma = :plataforma, updated_at = :fecha_actualizacion WHERE id = :unPK',
            ['plataforma' => $plataforma, 'fecha_actualizacion' => now(), 'unPK' => (int) $video]
        );
        
        //Para mostrar los datos 
        echo '<pre>'; var_dump($actualizarDatos); echo '</pre>';
        return;
    }

//********************************************************************************************************** */

// DELETE con Raw SQL
$deleted = DB::delete('DELETE FROM users WHERE created_at < ?', ['2023-01-01']);

//Usando en controlador
    public function eliminar($video)
    {
        $delete = DB::delete('DELETE FROM videos WHERE id = ?', [(int) $video]);
        //Para mostrar los datos 
        echo '<pre>'; var_dump($delete); echo '</pre>';
        return;
    }

    public function eliminarTabla()
    {
        //Este metodo "statement" es un ejemplo de una sentencia SQL que no retorna nada
        DB::statement('DROP TABLE videos');
    }
}
