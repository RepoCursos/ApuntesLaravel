<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['file_uri', 'nombre', 'estado', 'torneo_id'];

    public function torneo(): BelongsTo
    {
        return $this->belongsTo(Torneo::class);
    }

    public function jugadores(): HasMany
    {
        return $this->hasMany(Jugador::class);
    }

    public function partidos(): BelongsToMany
    {
        return $this->belongsToMany(Partido::class)
                    ->withPivot('resultado', 'golesF', 'golesE', 'estado')
                    ->withTimestamps();
    }
}
