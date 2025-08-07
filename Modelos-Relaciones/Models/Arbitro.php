<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Arbitro extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nombre', 'apellido', 'fecha_nac', 'direccion', 'telefono', 'email'];

    public function partidos(): HasMany
    {
        return $this->hasMany(Partido::class);
    }
}
