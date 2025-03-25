<p>{{ $nome }}, você tem {{ $idade }} anos.</p>
<p>Altura: {{ $altura }}m - Peso: {{ $peso }}kg</p>
<p>IMC: {{ number_format($imc, 2) }}</p>
<p>Classificação: <strong>{{ $classificacao }}</strong></p>
<a href="{{ route('home') }}">Voltar</a>
