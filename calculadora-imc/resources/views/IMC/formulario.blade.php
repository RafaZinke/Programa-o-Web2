<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
</head>
<body>
    <div class="container">
        <h1>Calculadora de IMC</h1>
        
        <p>
            Descubra seu Índice de Massa Corporal (IMC).
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

        <form action="{{ route('calcular') }}" method="POST">
            @csrf
            <label>Nome:</label>
            <input type="text" name="nome" required>

            <label>Data de Nascimento:</label>
            <input type="date" name="data_nascimento" required>

            <label>Peso (kg):</label>
            <input type="number" name="peso" step="0.1" required>

            <label>Altura (m):</label>
            <input type="number" name="altura" step="0.01" required>

            <button type="submit">Calcular IMC</button>
        </form>
    </div>
</body>
</html>
