<?php

echo "<h2>Dados Enviados</h2>";
echo "Nome: " . htmlspecialchars($_REQUEST['nome'] ?? 'Não informado') . "<br>";
echo "Telefone: " . htmlspecialchars($_REQUEST['telefone'] ?? 'Não informado') . "<br>";
echo "E-mail: " . htmlspecialchars($_REQUEST['email'] ?? 'Não informado') . "<br>";
echo "Mensagem: " . nl2br(htmlspecialchars($_REQUEST['mensagem'] ?? 'Não informado')) . "<br>";


echo "<h2>Método HTTP Utilizado</h2>";
echo $_SERVER['REQUEST_METHOD'];

?>
