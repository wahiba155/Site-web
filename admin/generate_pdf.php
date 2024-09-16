<?php
require('tcpdf/tcpdf.php');

class FacturePDF extends TCPDF {
    public function __construct() {
        parent::__construct();
    }

    public function generatePDF($pdfContent, $filename) {
        $this->AddPage();
        $this->SetFont('Arial', 'B', 16);
        $this->writeHTML($pdfContent);
        $this->Output($filename, 'D');
    }
}

// Génération du contenu PDF (exemple simplifié)
$pdfContent = '<h1>Contenu de votre facture au format PDF</h1>';

// Création de l'objet FacturePDF
$facturePDF = new FacturePDF();

// Définir le nom du fichier PDF à télécharger
$filename = 'facture.pdf';

// Générer et télécharger la facture au format PDF
$facturePDF->generatePDF($pdfContent, $filename);