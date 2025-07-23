<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partido extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['fecha', 'hora', 'importe', 'estado', 'arbitro_id', 'cancha_id'];

    public function arbitro(): BelongsTo
    {
        return $this->belongsTo(Arbitro::class)->withDefault();
    }

    public function cancha(): BelongsTo
    {
        return $this->belongsTo(Cancha::class);
    }

    public function equipos(): BelongsToMany
    {
        return $this->belongsToMany(Equipo::class)
                    ->withPivot('resultado', 'golesF', 'golesE', 'estado')
                    ->withTimestamps();
    }

    public function jugadores(): BelongsToMany
    {
        return $this->belongsToMany(Jugador::class)
                    ->withPivot('goles', 'asistencias', 'promedio', 'valor_tarjeta', 'estado', 'tarjeta_id')
                    ->withTimestamps();
    }
}
