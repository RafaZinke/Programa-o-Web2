<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado IMC</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
</head>
<body>
    <div class="container">
        <h1>Resultado do IMC</h1>
        
        <p class="result">
            {{ $dados['nome'] }}, você tem {{ $idade }} anos, sua altura é {{ $dados['altura'] }}m, 
            seu peso é {{ $dados['peso'] }}kg e seu IMC é: <strong>{{ number_format($imc, 2) }}</strong>.
        </p>
        
        <p class="result">
            Pelo cálculo do IMC, você está classificado como: <strong>{{ $classificacao }}</strong>.
            <span class="info-icon">ℹ️
                <div class="tooltip">
                    <strong>Classificação do IMC:</strong><br>
                    - Menor que 18.5 → Abaixo do peso<br>
                    - 18.5 - 24.9 → Peso Normal<br>
                    - 25.0 - 29.9 → Sobrepeso<br>
                    - 30.0 - 34.9 → Obesidade Grau I<br>
                    - 35.0 - 39.9 → Obesidade Grau II<br>
                    - Maior que 40 → Obesidade Grau III
                </div>
            </span>
        </p>

        <a href="{{ url('/') }}" class="back-link">Voltar</a>
    </div>
</body>
</html>
