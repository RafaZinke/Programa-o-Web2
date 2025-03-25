<?php

namespace App\Models;

class Sono
{
    public static function avaliarQualidade($idade, $horas)
    {
        if ($idade >= 18 && $idade <= 64) {
            $min = 7; $max = 9;
        } elseif ($idade >= 65) {
            $min = 7; $max = 8;
        } else {
            return 'Idade fora da faixa avaliada';
        }

        return match(true) {
            $horas < $min => 'Sono insuficiente',
            $horas > $max => 'Sono excessivo',
            default => 'Sono adequado',
        };
    }
}
