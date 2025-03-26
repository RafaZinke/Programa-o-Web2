<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>EX4</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
</head>
<body>
<div class="container">

<h3>Resultado do Cálculo de Consumo</h3>
<p><strong>{{ $combustivel }}:</strong> R$ {{ number_format($gasto, 2, ',', '.') }}</p>
<a href="{{ route('home') }}">Voltar</a>
</div>
</body>
</html>
