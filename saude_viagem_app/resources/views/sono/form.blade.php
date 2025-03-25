<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sua Aplicação</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
</head>
<body>
<div class="container">

<form method="POST" action="{{ route('sono.eval') }}">
    @csrf
    Idade: <input type="number" name="idade"><br>
    Média de horas dormidas por noite: <input type="number" step="0.1" name="horas"><br>
    <button type="submit">Avaliar Sono</button>
</form>
</div>
</body>
</html>
