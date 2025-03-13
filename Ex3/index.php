<?php
require_once 'vendor/autoload.php';


use Dompdf\Dompdf;

class PDFGenerator {
    private $dompdf;

    public function __construct() {
        $this->dompdf = new Dompdf();
    }

 
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
