<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sua Aplicação</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
</head>
<body>
<div class="container">

<p>Idade: {{ $idade }} anos</p>
<p>Horas dormidas: {{ $horas }} horas</p>
<p>Qualidade do sono: <strong>{{ $avaliacao }}</strong></p>
<a href="{{ route('home') }}">Voltar</a>
</div>
</body>
</html>
