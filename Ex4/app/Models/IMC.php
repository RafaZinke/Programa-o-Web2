<?php

namespace App\Models;

class IMC
{
    public static function calcular($peso, $altura)
    {
        return $peso / ($altura * $altura);
    }

    public static function classificar($imc)
    {
        return match(true) {
            $imc < 18.5 => 'Abaixo do peso',
            $imc < 24.9 => 'Peso normal',
            $imc < 29.9 => 'Sobrepeso',
            $imc < 34.9 => 'Obesidade grau 1',
            $imc < 39.9 => 'Obesidade grau 2',
            default => 'Obesidade grau 3',
        };
    }
}
