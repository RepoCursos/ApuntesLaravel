<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jugador extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nombre', 'apellido', 'fecha_nac', 'direccion', 'telefono', 'email', 'posicion', 'num_camiseta', 'equipo_id'];

    public function equipo(): BelongsTo
    {
        return $this->belongsTo(Equipo::class);
    }

    public function partidos(): BelongsToMany
    {
        return $this->belongsToMany(Partido::class)
                    ->withPivot('goles', 'asistencias', 'promedio', 'valor_tarjeta', 'estado', 'tarjeta_id')
                    ->withTimestamps();
    }

}
