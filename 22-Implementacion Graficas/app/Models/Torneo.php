<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Torneo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nombre', 'tipo', 'inscripcion', 'valor_cancha', 'fecha', 'ubicacion', 'cant_equipos', 'premios', 'reglas_gral', 'sis_competicion', 'elegibilidad', 'disciplina', 'publicado'];

    public function equipos(): HasMany
    {
        return $this->hasMany(Equipo::class);
    }

    public function partidos()
    {
        return $this->hasManyThrough(Partido::class, Equipo::class);
    }
}
