<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class JugadorPartido extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'jugador_partido';

    protected $fillable = ['goles', 'asistencias', 'valor_tarjeta', 'estado', 'partido_id', 'jugador_id', 'tarjeta_id'];

    public function partido(): BelongsTo
    {
        return $this->belongsTo(Partido::class);
    }

    public function jugador(): BelongsTo
    {
        return $this->belongsTo(Jugador::class);
    }

    public function tarjeta(): BelongsTo
    {
        return $this->belongsTo(Tarjeta::class);
    }
}
