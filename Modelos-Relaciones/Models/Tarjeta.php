<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarjeta extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nombre', 'multa'];

    public function jugadorpartidos(): HasMany
    {
        return $this->hasMany(JugadorPartido::class);
    }
}
