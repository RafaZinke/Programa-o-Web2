<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>EX4</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
</head>
<body>
<div class="container">


<form method="POST" action="{{ route('imc.calc') }}">
    @csrf
    Nome: <input type="text" name="nome"><br>
    Data Nascimento: <input type="date" name="nascimento"><br>
    Peso (kg): <input type="number" step="0.01" name="peso"><br>
    Altura (m): <input type="number" step="0.01" name="altura"><br>
    <button type="submit">Calcular IMC</button>
</form>
</div>
</body>
</html>
