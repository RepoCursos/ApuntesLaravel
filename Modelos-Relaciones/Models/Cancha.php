<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cancha extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nombre', 'valor_hora'];

    public function partido(): HasMany
    {
        return $this->hasMany(Partido::class);
    }
}
