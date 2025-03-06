<?php
require_once 'C:\xampp\htdocs\Programa-o-Web2\Ex3\vendor\autoload.php';

use Dompdf\Dompdf;

class PDFGenerator {
    private $dompdf;

    public function __construct() {
        $this->dompdf = new Dompdf();
    }

    /**
     * Gera e exibe o PDF.
     *
     * @param string $html Conteúdo HTML que será convertido em PDF.
     * @param string $fileName Nome do arquivo PDF.
     * @param string $paper Tamanho do papel (ex: A4).
     * @param string $orientation Orientação do papel (portrait ou landscape).
     * @param bool $stream Se verdadeiro, o PDF será enviado para o navegador; caso contrário, retorna o conteúdo.
     * @return string|void
     */
    public function generatePDF($html, $fileName = "exemplo.pdf", $paper = "A4", $orientation = "portrait", $stream = true) {
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper($paper, $orientation);
        $this->dompdf->render();

        if ($stream) {
            $this->dompdf->stream($fileName, ["Attachment" => false]);
        } else {
            return $this->dompdf->output();
        }
    }
}

// Conteúdo HTML
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

$pdfGenerator = new PDFGenerator();
$pdfGenerator->generatePDF($html);
?>
