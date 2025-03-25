<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sono;

class SonoController extends Controller
{
    public function form()
    {
        return view('sono.form');
    }

    public function avaliar(Request $request)
    {
        $idade = $request->idade;
        $horas = $request->horas;

        $avaliacao = Sono::avaliarQualidade($idade, $horas);

        return view('sono.resultado', compact('idade', 'horas', 'avaliacao'));
    }
}
