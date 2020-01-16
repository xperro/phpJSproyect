<?php
require('fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
//inserto la cabecera poniendo una imagen dentro de una celda
//$pdf->Cell(700,85,$pdf->Image('./images/logo.png',30,12,160),0,0,'C');
$pdf->Cell(100,12,"Presupuesto: ". $campodb['nropresuputao']);
$pdf->Cell(100,12,"Fecha: ". date('d/m/Y'));
$pdf->Line(35,40,190,40);
$pdf->Ln(7);
$pdf->Cell(100,12,"Nombre : ".$campodb['nombre']));
$pdf->Cell(90,12,"Nif: ".$rowcli['nif']);
$pdf->Line(35,48,190,48);
$pdf->Ln(7);
$pdf->Cell(100,12,"Domicilio: ". $campodb['direccion']);
$pdf->Line(35,56,190,56);
$pdf->Ln(7);
$pdf->Cell(90,12,acentos("Teléfono: ".$campodb['telefono']));
$pdf->Line(35,62,190,62);
$pdf->Ln(7);
$pdf->Cell(100,12,"Equipo: ".$campodb['ordenador']);
$pdf->Line(35,68,190,68);
$pdf->Ln(9);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,12,'PRESUPUESTO');
$pdf->Ln(2);
$pdf->SetFont('Arial','',8);
$pdf->Output();
?>