<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sua Aplicação</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
</head>
<body>
<div class="container">


<p>{{ $nome }}, você tem {{ $idade }} anos.</p>
<p>Altura: {{ $altura }}m - Peso: {{ $peso }}kg</p>
<p>IMC: {{ number_format($imc, 2) }}</p>
<p>Classificação: <strong>{{ $classificacao }}</strong></p>
<a href="{{ route('home') }}">Voltar</a>

</div>
</body>
</html>
