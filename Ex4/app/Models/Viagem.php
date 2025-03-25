<?php

namespace App\Models;

class Viagem
{
    public static function calcularGasto($valor, $distancia, $consumo)
    {
        return ($distancia / $consumo) * $valor;
    }
}
