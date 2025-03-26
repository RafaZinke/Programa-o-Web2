<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>EX4</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
</head>
<body>
<div class="container">

<form method="GET" action="{{ route('viagem.calc') }}">
    Combustível:
    <select name="combustivel">
        <option value="Gasolina">Gasolina</option>
        <option value="Álcool">Álcool</option>
        <option value="Diesel">Diesel</option>
    </select><br>
    Valor do combustível (R$): <input type="text" name="valorcombustivel"><br>
    Distância a percorrer (km): <input type="number" name="distancia"><br>
    Consumo do veículo (km/l): <input type="number" step="0.1" name="consumo"><br>
    <button type="submit">Calcular</button>
</form>
</div>
</body>
</html>
