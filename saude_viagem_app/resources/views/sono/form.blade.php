<form method="POST" action="{{ route('sono.eval') }}">
    @csrf
    Idade: <input type="number" name="idade"><br>
    Média de horas dormidas por noite: <input type="number" step="0.1" name="horas"><br>
    <button type="submit">Avaliar Sono</button>
</form>
