<?php
	session_start();
	include '../PHP/Conexion.php';
	include 'plantilla.php';
	$string = $_POST['periodo1'];
	$arreglo = explode('-', $string, 3);
	$arreglo2 = explode('-',$_POST['periodo2'],3);
	$arreglo3 = explode('-',$_POST['event_date'],3);
	$mes = "error semantico";
	$mes2 = "" ; 
	$mes3 = "";
	//$opcion = $arreglo[1];
	switch ($arreglo3[1]) {
		case 1:
			$mes3 = "ENERO";
			break;
		case 2:
			$mes3 = "FEBRERO";
			break;
		case 3:
			$mes3 = "MARZO";
			break;
		case 4:
			$mes3 = "ABRIL";
			break;
		case 5:
			$mes3 = "MAYO";
			break;
		case 6:
			$mes3 = "JUNIO";
			break;
		case 7:
			$mes3 = "JULIO";
			break;
		case 8:
			$mes3 = "AGOSTO";
			break;
		case 9:
			$mes3 = "SEPTIEMBRE";
			break;
		case 10:
			$mes3 = "OCTUBRE";
			break;
		case 11:
			$mes3 = "NOVIEMBRE";
			break;
		case 12:
			$mes3 = "DICIEMBRE";
			break;
	} 
	switch ($arreglo[1]) {
		case 1:
			$mes = "ENERO";
			break;
		case 2:
			$mes = "FEBRERO";
			break;
		case 3:
			$mes = "MARZO";
			break;
		case 4:
			$mes = "ABRIL";
			break;
		case 5:
			$mes = "MAYO";
			break;
		case 6:
			$mes = "JUNIO";
			break;
		case 7:
			$mes = "JULIO";
			break;
		case 8:
			$mes = "AGOSTO";
			break;
		case 9:
			$mes = "SEPTIEMBRE";
			break;
		case 10:
			$mes = "OCTUBRE";
			break;
		case 11:
			$mes = "NOVIEMBRE";
			break;
		case 12:
			$mes = "DICIEMBRE";
			break;
	} 
	switch ($arreglo2[1]) {
		case 1:
			$mes2 = "ENERO";
			break;
		case 2:
			$mes2 = "FEBRERO";
			break;
		case 3:
			$mes2 = "MARZO";
			break;
		case 4:
			$mes2 = "ABRIL";
			break;
		case 5:
			$mes2 = "MAYO";
			break;
		case 6:
			$mes2 = "JUNIO";
			break;
		case 7:
			$mes2 = "JULIO";
			break;
		case 8:
			$mes2 = "AGOSTO";
			break;
		case 9:
			$mes2 = "SEPTIEMBRE";
			break;
		case 10:
			$mes2 = "OCTUBRE";
			break;
		case 11:
			$mes2 = "NOVIEMBRE";
			break;
		case 12:
			$mes2 = "DICIEMBRE";
			break;
	} 
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(100,10,utf8_decode($_POST['tipoInf']),0,1,'L');//agrega una celda al $pdf
            //recibe varios parametros, el primero es el largo de la celda
            //el segundo sera el alto de la celda
            //el 3ro sera el texto
            //el 4to si tendra borde , 1 significa que si y 0 que nel
            //el 5to significa si llevara salto de linea
            //el 6to es la posicion de la celda , R right, L left C center
	//$pdf->Cell(190,10,date("d")."/".date("m")."/".date("Y"),0,1,'R');
	$pdf->Cell(190,10,$arreglo3[2].' DE '.$mes3.' DE '.$arreglo3[0],0,1,'R');
	$pdf->Cell(50,10,'Titulo del Proyecto',1,0,'R');
	$pdf->SetFont('Arial','B',7);
	$pdf->Cell(140,10,utf8_decode($_POST['titproy']),1,1,'L');
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(50,10,'Clave',1,0,'R');
	$pdf->Cell(140,10,utf8_decode($_POST['cve']),1,1,'L');
	$pdf->Cell(50,10,'Plantel',1,0,'R');
	$pdf->Cell(140,10,utf8_decode($_POST['ptel']),1,1,'L');
	$pdf->Cell(50,10,'Responsable',1,0,'R');
	$pdf->Cell(140,10,utf8_decode($_POST['respon']),1,1,'L');
	$pdf->Cell(50,10,'Periodo Reportado',1,0,'R');
	$pdf->Cell(140,10,'Del '.$arreglo[2].' De '.$mes.' Del '.$arreglo[0].' Al '.$arreglo2[2].' De '.$mes2.' Del '.$arreglo2[0],1,1,'L');
	$pdf->Cell(190,10,'',0,1,'L');
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(190,10,'Avance del Proyecto: %'.utf8_decode($_POST['fAvance']),0,1,'R');
	$pdf->Cell(190,10,'Monto ejercido: $'.utf8_decode($_POST['montoEjer']),0,1,'R');
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(190,10,'Resumen',0,1,'L');
	$pdf->SetFont('Arial','B',8);

	///cambiar las propiedades del resumen del pdf
	$pdf->MultiCell(190,4,utf8_decode($_POST['resumen']),1,'L',0);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(190,10,'Comentarios',1,1,'L');
	$pdf->SetFont('Arial','B',8);
	$pdf->MultiCell(190,4,utf8_decode($_POST['comment']),1,'L',0);
	$pdf->Cell(190,10,'',0,1,'L');
	$pdf->Cell(95,5,'Responsable Tecnico','LTR',0,'C');
	$pdf->Cell(95,5,'Aval','LTR',1,'C');
	// $pdf->Cell(95,10,'','LR',0,'C');
	// $pdf->Cell(95,10,'','LR',1,'C');
	 $pdf->Cell(95,20,'','LR',0,'C');
	$pdf->Cell(95,20,'','LR',1,'C');
	$pdf->Cell(95,5,'Nombre y Firma','LRB',0,'C');
	$pdf->Cell(95,5,'Nombre y Firma','LRB',1,'C');
	$pdf->SetFont('Arial','B',7);
	$pdf->MultiCell(190,3,utf8_decode('La firma del aval podra ser preferentemente del Jefe de la Division de Estudios de Prostgrado e Investigacion, el Jefe del Departamento Académico correspondiente o del Subdirector Académico'),0,'L',0);
	// Cell(float w [, float h [, string txt [, mixed border [, int ln 
	// [, string align [, boolean fill [, mixed link]]]]]]])
	//  cell (ancho, alto,texto,borde)
	
	$bd = new Conexion();
	$bd->query("INSERT INTO `movimientos`(`Descripcion`, `IDUsuario`) VALUES 
	('".$_SESSION['NombrePersona']." GENERO un reporte, el cual es el ".$_POST['tipoInf'].
	" para el proyecto con clave: ".$_POST['cve']." - ".$_POST['titproy']."',
	(SELECT `ID` FROM `usuarios` WHERE `Uname` like '".$_SESSION['Usuario']."'))")or die($bd->error);
	$pdf->Output();
	
?>
