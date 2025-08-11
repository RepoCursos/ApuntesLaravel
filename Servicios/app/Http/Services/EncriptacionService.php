<?php

namespace App\Http\Services;

use Illuminate\Support\Str;

class EncriptacionService
{
    private int $numeroCaracteres;

    public function __construct()
    {
        $this->numeroCaracteres = 41;
    }

    /* Genera un String Aleatorio */
    public function generarCadenaAleatoria()
    {
        $cadena = Str::random($this->numeroCaracteres);
        return $cadena;
    }

    public function setNumeroCaracteres(int $numCaracteres): void
    {
        $this->numeroCaracteres = $numCaracteres;
    }

    public function getNumeroCaracteres(): int
    {
        return $this->numeroCaracteres;
    }
}