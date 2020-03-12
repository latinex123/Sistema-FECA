<?php

$matricula = $_GET['matricula'];
$existe = 0;
     
include("../../abrir_conexion.php");
require('fpdf/fpdf.php');


$resultado=mysqli_query($conectar, "SELECT Alumno_Matricula, Semestre, Grupo, fechaPago, Campus, Importe FROM pago WHERE Alumno_Matricula='$matricula'");


$fpdf = new FPDF();
$fpdf->AddPage('PORTRAIT', 'letter');

class pdf extends FPDF{

	public function header(){

	$this->SetFont('Arial', 'B', '14');
	$this->Cell(0, 5,'Unidad Autónoma de Zacatecas', 0, 0, 'C');
	$this->Ln(5);
	$this->SetFont('Arial', 'B', '10');
	$this->Cell(0, 5,'"Francisco Garcia Salinas"', 0, 0, 'C');
	$this->Ln(5);
	$this->SetFont('Arial', 'B', '10');
	$this->Cell(0, 5,'Unidad académica de contaduria y administración', 0, 0, 'C');

	$this->Image('fpdf/feca.png', 20, 5, 30, 30, 'png');
	$this->Image('fpdf/img.jpg', 170, 8, 30, 25, 'jpg');
	}


public function footer(){

	$this->SetFont('Arial', 'B', 10);
	$this->SetY(-15);
	$this->SetX(-30);
	$this->AliasNbPages('tpagina');
	$this->write(5, $this->PageNo().'/tpagina');
	}

}
$fpdf = new pdf('P', 'mm', 'letter', true);
$fpdf->AddPage('portrait', 'letter');
$fpdf->SetFont('Arial', 'B', 14);
$fpdf->SetY(30);
$fpdf->Ln(5);
$fpdf->Cell(0, 5, 'Registro de Pagos', 0, 0, 'C');


$fpdf->Ln(20);


$fpdf->SetFontSize(10);
$fpdf->SetFont('Arial', 'B');
$fpdf->SetFillColor(255,255,255);
$fpdf->SetTextcolor(40, 40, 40);
$fpdf->SetDrawColor(88,88,88);
$fpdf->Cell(40, 5, 'Matrícula', 0, 0, 'C', 1);
$fpdf->Cell(40, 5, 'Campus', 0, 0, 'C', 1);
$fpdf->Cell(30, 5, 'Semestre', 0, 0, 'C', 1);
$fpdf->Cell(30, 5, 'Grupo', 0, 0, 'C', 1);
$fpdf->Cell(20, 5, 'Fecha', 0, 0, 'C', 1);
$fpdf->Cell(30, 5, 'Adeudo', 0, 0, 'C', 1);
$fpdf->SetDrawColor(0,11,49);
$fpdf->SetLineWidth(1);
$fpdf->Line(10, 65, 205, 65);
$fpdf->SetTextColor(0,0,0);
$fpdf->Ln(20);

$fpdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$fpdf->Cell(40,5,utf8_decode($row['Alumno_Matricula']),0,0,'C', 1);
		$fpdf->Cell(40,5,utf8_decode($row['Campus']),0,0,'C', 1);
		$fpdf->Cell(30,5,utf8_decode($row['Semestre']),0,0,'C', 1);
		$fpdf->Cell(30,5,utf8_decode($row['Grupo']),0,0,'C',1);
		$fpdf->Cell(25,5,$row['fechaPago'],0,0,'C',1);
		$fpdf->Cell(25,5,utf8_decode("$".$row['Importe'].".00"),0,0,'C',1);
		$fpdf->Ln(5);
}


$fpdf->OutPut();

include("../../cerrar_conexion.php");

?>


