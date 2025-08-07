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

    protected $fillable = ['nombre', 'tipo', 'inscripcion', 'valor_cancha'];

    public function equipos(): HasMany
    {
        return $this->hasMany(Equipo::class);
    }
}
