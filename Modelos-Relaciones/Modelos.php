<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    /** ver video: https://www.youtube.com/watch?v=njvzNhF0ka4&list=PLDllzmccetSM50U0Y9fTOWHvSzAZ_W6Il&index=4 */
    /**Ejemplos de los metodos que podemos usar */

    protected $table = "notes";
    /** $table => en caso de que por algun motivo no se respete la convencion de nombres y el nombre de la
     *  "tabla" sea: (2024_04_16_194335_create_tareas_table) y no notes, usamos esta sintaxis para que mi modelo tome como 
     * referencia al nombre que le estoy indicando */

    protected $fillable = [
        'title',
        'description',
        'deadline',
        'done'
    ];
    /** $fillable => este metodo sirve para indicar que elementos quiero que se modifiquen por el usuario*/

    protected $guarded = [];
    /** $guarded => este metodo sirve para indicar que elementos quiero proteger y que no se modifiquen por el usuario 
     * no es necesario poner fillable y guarded, ya que con indicar uno por defecto el otro se ejecuta
     */

    protected $casts = [
        'deadline' => 'date'
    ];
    /** $casts =>  es para forzar a que se introduzca un valor determinado 
     * Ej: en deadline necesito que se de tipo fecha, con esto solo permitira ese tipo de dato
     */

    protected $hidden = ['password'];
    /** $hidden => no sirve para evitar entregar datos que no queremos entregar y queremos cuidar.
     * Ej: el password -> este datos no tenemos que compartirlo con nadie, esto se puede dar cuando estemos interactuando
     * con Apis que enviamos a traves de un JSON
     */
}
