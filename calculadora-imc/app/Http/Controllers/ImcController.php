<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImcController extends Controller
{
    public function index()
    {
        return view('imc.formulario');
    }

    public function calcular(Request $request)
    {
        // Validação dos dados
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'peso' => 'required|numeric|min:1',
            'altura' => 'required|numeric|min:0.5',
        ]);

        // Cálculo da idade
        $idade = date_diff(date_create($dados['data_nascimento']), date_create('now'))->y;

        // Cálculo do IMC
        $imc = $dados['peso'] / ($dados['altura'] * $dados['altura']);

        // Classificação do IMC
        $classificacao = $this->classificarImc($imc);

        return view('imc.resultado', compact('dados', 'idade', 'imc', 'classificacao'));
    }

    private function classificarImc($imc)
    {
        if ($imc < 18.5) return 'Abaixo do peso';
        if ($imc < 24.9) return 'Peso normal';
        if ($imc < 29.9) return 'Sobrepeso';
        if ($imc < 34.9) return 'Obesidade Grau I';
        if ($imc < 39.9) return 'Obesidade Grau II';
        return 'Obesidade Grau III';
    }
}
