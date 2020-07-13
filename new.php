<?php
require('Dependencies/fpdf182/fpdf.php');
header('Content-Type: text/html; charset=utf-8');


class PDF extends FPDF
{

// Page header
function Header()
{
    // Logo
    $this->Image('logo-1.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $str = "Contrato de compra-venta vehículo";
    $str = utf8_decode($str);
    $this->Cell(30,10,$str,0,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$nombreComprador =  $_POST['nombreComprador'];
$apellidoComprador = $_POST['apellidoComprador'];
$nombreVendedor =  $_POST['nombreVendedor'];
$apellidoVendedor = $_POST['apellidoVendedor'];

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->AddFont('texto','','times.php',true);
$pdf->SetFont('texto','',12);

$str = 'Comparecen a la celebración del presente contrato de compraventa, por una parte '.$nombreComprador.' '.$apellidoComprador.', por sus propios y personales derechos, parte a la que para efectos del presente contrató se le denominará "El Vendedor"; y, por otra parte, '.$nombreVendedor.' '.$apellidoVendedor.' , igualmente por sus propios y personales derechos, a quien para efectos del presente instrumento se lo denominará como "El Comprador". Las comparecientes son mayores de edad, de estado civil ___________, domiciliadas en ____________, hábiles para ejercer derechos y contraer obligaciones.';

$str = utf8_decode($str);

$pdf->MultiCell(0,6,$str,0,1);
$pdf->Output();
?>