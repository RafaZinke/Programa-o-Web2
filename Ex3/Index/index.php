<?php
// Carrega o autoload do Composer
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;

// Instancia o objeto Dompdf
$dompdf = new Dompdf();

// Cria o conteúdo HTML que será convertido em PDF
$html = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exemplo de PDF com Dompdf</title>
</head>
<body>
    <h1>Olá, Mundo!</h1>
    <p>Este é um exemplo de geração de PDF utilizando o Dompdf.</p>
</body>
</html>
';

// Carrega o HTML no Dompdf
$dompdf->loadHtml($html);

// Define o tamanho do papel e a orientação
$dompdf->setPaper('A4', 'portrait');

// Renderiza o HTML como PDF
$dompdf->render();

// Exibe o PDF no navegador (Attachment false para abrir no navegador)
$dompdf->stream("exemplo.pdf", ["Attachment" => false]);
?>
