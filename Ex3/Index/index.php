<?php
require_once 'C:\xampp\htdocs\Programa-o-Web2\Ex3\vendor\autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$html = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exemplo de PDF com Dompdf</title>
</head>
<body>
    <h1>Olá, Mundo!</h1>
    <p>Este é um exemplo de geração de PDF utilizando o Dompdf para o exercício de programação Web 2.</p>
</body>
</html>
';

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream("exemplo.pdf", ["Attachment" => false]);
?>
