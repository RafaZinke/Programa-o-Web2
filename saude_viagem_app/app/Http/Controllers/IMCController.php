<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IMC;
use Carbon\Carbon;

class IMCController extends Controller
{
    public function form()
    {
        return view('imc.form');
    }

    public function calcular(Request $request)
    {
        $nome = $request->nome;
        $dataNasc = Carbon::parse($request->nascimento);
        $idade = $dataNasc->age;
        $peso = $request->peso;
        $altura = $request->altura;

        $imc = IMC::calcular($peso, $altura);
        $classificacao = IMC::classificar($imc);

        return view('imc.resultado', compact('nome', 'idade', 'peso', 'altura', 'imc', 'classificacao'));
    }
}


