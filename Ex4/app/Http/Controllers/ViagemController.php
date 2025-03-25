<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Viagem;

class ViagemController extends Controller
{
    public function form()
    {
        return view('viagem.form');
    }

    public function calcular(Request $request)
    {
        $combustivel = $request->combustivel;
        $valor = str_replace(',', '.', $request->valorcombustivel);
        $distancia = $request->distancia;
        $consumo = $request->consumo;

        $gasto = Viagem::calcularGasto($valor, $distancia, $consumo);

        return view('viagem.resultado', compact('combustivel', 'gasto'));
    }
}

