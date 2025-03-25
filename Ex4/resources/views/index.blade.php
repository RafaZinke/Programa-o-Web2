<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sua Aplicação</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
</head>
<body>
<div class="container">

<h2>Bem-vindo à Aplicação de Saúde e Viagem!</h2>
<ul>
    <li><a href="{{ route('imc.form') }}">Calcular IMC</a></li>
    <li><a href="{{ route('sono.form') }}">Avaliar Qualidade do Sono</a></li>
    <li><a href="{{ route('viagem.form') }}">Calcular Gasto com Viagem</a></li>
</ul>

</div>
</body>
</html>
