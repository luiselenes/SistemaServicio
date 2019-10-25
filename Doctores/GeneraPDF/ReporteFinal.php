<?php  
	session_start();
	include '../PHP/Conexion.php';
	include 'plantilla2.php';
	$string = $_POST['periodo1'];
	$arreglo = explode('-', $string, 3);
	$arreglo2 = explode('-',$_POST['periodo2'],3);
	$mes = "error semantico";
	$mes2 = "" ; 
	//$opcion = $arreglo[1];
	switch ($arreglo[1]) {
		case 1:
			$mes = "Enero";
			break;
		case 2:
			$mes = "Febrero";
			break;
		case 3:
			$mes = "Marzo";
			break;
		case 4:
			$mes = "Abril";
			break;
		case 5:
			$mes = "Mayo";
			break;
		case 6:
			$mes = "Junio";
			break;
		case 7:
			$mes = "Julio";
			break;
		case 8:
			$mes = "Agosto";
			break;
		case 9:
			$mes = "Septiembre";
			break;
		case 10:
			$mes = "Octubre";
			break;
		case 11:
			$mes = "Noviembre";
			break;
		case 12:
			$mes = "Diciembre";
			break;
	} 
	switch ($arreglo2[1]) {
		case 1:
			$mes2 = "Enero";
			break;
		case 2:
			$mes2 = "Febrero";
			break;
		case 3:
			$mes2 = "Marzo";
			break;
		case 4:
			$mes2 = "Abril";
			break;
		case 5:
			$mes2 = "Mayo";
			break;
		case 6:
			$mes2 = "Junio";
			break;
		case 7:
			$mes2 = "Julio";
			break;
		case 8:
			$mes2 = "Agosto";
			break;
		case 9:
			$mes2 = "Septiembre";
			break;
		case 10:
			$mes2 = "Octubre";
			break;
		case 11:
			$mes2 = "Noviembre";
			break;
		case 12:
			$mes2 = "Diciembre";
			break;
	} 
	

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->AddFont('Soberana','','SoberanaSans-Regular.php');
	$pdf->AddFont('Soberana','B','SoberanaSans-Black.php');
	$pdf->AddFont('Soberana','Bl','SoberanaSans-Bold.php');

	$pdf->SetFont('Soberana','Bl',16);

	$pdf->Cell(0,10,'',0,0,'C');
	$pdf->Ln();

	$pdf->Cell(0,10,utf8_decode('INFORME TÉCNICO FINAL PARA PROYECTOS FINANCIADOS POR EL'),0,1,'C');
	$pdf->Cell(0,10,utf8_decode('TECNOLÓGICO NACIONAL DE MÉXICO'),0,1,'C');
	//agrega una celda al $pdf
            //recibe varios parametros, el primero es el largo de la celda
            //el segundo sera el alto de la celda
            //el 3ro sera el texto
            //el 4to si tendra borde , 1 significa que si y 0 que nel
            //el 5to significa si llevara salto de linea
            //el 6to es la posicion de la celda , R right, L left C center
	$pdf->SetFont('Soberana','B',12);
	$pdf->Cell(0,10,utf8_decode('I. Identificación del Proyecto'),0,1,'L');
	//$pdf->Ln();
	$pdf->SetFont('Soberana','',10);
	$pdf->Cell(0,10,utf8_decode('Institución:'),0,1,'C');
	$pdf->Cell(20,7,utf8_decode(''),0,0,'C');
	$pdf->Cell(150,7,utf8_decode('Instituto Tecnológico de Culiacán'),1,0,'C');
	$pdf->Cell(20,7,utf8_decode(''),0,1,'C');
	$pdf->Ln();
	$pdf->Cell(0,10,utf8_decode('Responsable Técnico del Proyecto:'),0,1,'C');
	$pdf->setX(60);
	$pdf->Cell(90,15,utf8_decode($_POST['respon']),1,1,'C');
	$pdf->Ln();
	//////////////////////////////////////////////////////
	$pdf->Cell(35,5,utf8_decode('Clave del proyecto:'),0,0,'L');
	$pdf->Cell(20,10,utf8_decode($_POST['cve']),1,1,'L');
	$pdf->Cell(35,5,utf8_decode('Titulo del proyecto: '),0,0,'L');
	$pdf->setX(45);
	$pdf->multicell(0,5,utf8_decode($_POST['titproy']),1,'C',0);
	$pdf->Ln();
	//////////////////////////////////////////////////////////////////////////
	$pdf->Cell(0,10,utf8_decode('Tipo de investigación: '.$_POST['TipoInv']),0,1,'L');
	$pdf->Cell(0,10,utf8_decode('Duración del proyecto: '.$_POST['Duracion']),0,1,'L');
	$pdf->Cell(51,5,utf8_decode('Fecha de inicio del proyecto:'),0,0,'L');
	$pdf->Cell(45,5,$arreglo[2].' De '.$mes.' Del '.$arreglo[0],'B',1,'L');
	$pdf->Cell(55,5,utf8_decode('Fecha de término del proyecto:'),0,0,'L');
	$pdf->Cell(45,5,$arreglo2[2].' De '.$mes2.' Del '.$arreglo2[0],'B',1,'L');

	$pdf->Ln();
	$pdf->SetFont('Soberana','B',12);
	$pdf->Cell(0,10,utf8_decode('II. Resultados'),0,1,'L');
	$pdf->SetFont('Soberana','Bl',10);
	$pdf->Cell(0,10,'1. Resumen del proyecto',0,1,'L');
	//$pdf->Ln();
	$pdf->SetFont('Soberana','Bl',9);
	$pdf->Cell(0,10,utf8_decode('Introducción'),0,1,'L');
	$pdf->SetFont('Arial','',6);
	$pdf->Cell(0,10,utf8_decode('Contiene una descripcion general de la problematica que aborda el proyecto de investigacion'),0,1,'L');
	$pdf->SetFont('Soberana','',9);
	$pdf->multicell(0,10,utf8_decode($_POST['resumen']),0,'J',0);
	
	$pdf->SetFont('Soberana','Bl',9);
	$pdf->Cell(0,10,'Objetivos',0,1,'L');
	$pdf->SetFont('Arial','',6);
	$pdf->Cell(0,10,'Contiene el esclarecimiento de los obetivos que se cumplieron con el desarrollo del proyecto de forma cualitativa.',0,1,'L');
	$pdf->SetFont('Soberana','',11);
	$pdf->Cell(0,10,'GENERAL',0,1,'L');
	$pdf->Cell(0,5,'',0,1,'L');
	$pdf->SetFont('Soberana','',9);
	$pdf->multicell(190,10,utf8_decode($_POST['general']),0,'J',0);
	$pdf->Cell(0,5,'',0,1,'L');
	$pdf->SetFont('Soberana','',11);
	$pdf->Cell(0,10,'ESPECIFICOS',0,1,'L');
	$pdf->Cell(0,5,'',0,1,'L');
	$pdf->SetFont('Soberana','',9);
	$pdf->multicell(190,10,utf8_decode($_POST['especificos']),0,'J',0);
	$pdf->Cell(0,10,'',0,1,'L');
	$pdf->SetFont('Soberana','Bl',9);
	$pdf->Cell(0,10,'Metas',0,1,'L');
	$pdf->Cell(0,5,'',0,1,'L');
	$pdf->SetFont('Arial','',6);
	$pdf->multicell(190,10,utf8_decode('Contiente los resultados concretos obtenidos en forma cuantitativa respecto a tesis desarrolladas, publicaciones, trabajos de residercera profesional. Patentes en tramite, participación de eventos, etc.'),0,'J',0);
	//utf8_decode($_POST['resumem'])
	$pdf->SetFont('Soberana','',9);
	$pdf->multicell(190,10,utf8_decode($_POST['metas']),0,'J',0);
	$pdf->Cell(0,5,'',0,1,'L');
	$pdf->SetFont('Soberana','Bl',9);
	$pdf->Cell(0,10,'Desarrollo y Resultados del proyecto:',0,1,'L');
	$pdf->SetFont('Arial','',6);
	$pdf->Cell(0,10,'Contiene una explicacion de los procedimientos seguidos para el cumpliento de los objetivos y metas que conforman el proyecto',0,1,'L');
	$pdf->SetFont('Soberana','',9);
	$pdf->multicell(190,10,utf8_decode($_POST['DesarrolloProyecto']),0,'J',0);
	$pdf->Cell(0,5,'',0,1,'L');
	$pdf->SetFont('Soberana','Bl',9);
	$pdf->cell(0,10,'Resultados del proyecto',0,1,'L');
	$pdf->SetFont('Soberana','',9);
	$pdf->cell(0,10,'Durante el periodo reportado se lograron los entregables siguientes:',0,1,'L');
	$pdf->multicell(190,10,utf8_decode($_POST['entregables']),0,'J',0);
	$pdf->Cell(0,5,'',0,1,'L');
	$pdf->SetFont('Soberana','Bl',9);
	$pdf->cell(0,10,'Conclusiones/Observaciones',0,1,'L');
	$pdf->SetFont('Arial','',6);
	$pdf->cell(0,10,'Contiene comentarios al respecto del proyecto desarrollado.',0,1,'L');
	$pdf->SetFont('Soberana','',9);
	$pdf->multicell(190,10,utf8_decode($_POST['conclusiones']),0,'J',0);
	$pdf->Cell(0,5,'',0,1,'L');
	$pdf->SetFont('Soberana','Bl',10);
	$pdf->Cell(0,10,'2. Objetivo del proyecto',0,1,'L');
	$pdf->SetFont('Soberana','',11);
	$pdf->Cell(0,10,'Grado de cumpliento del objetivo propuesto:'.utf8_decode($_POST['gradoCumplimiento']),0,1,'C');
	$pdf->SetFont('Soberana','',9);
	$pdf->Cell(0,10,'GENERAL:',0,1,'L');
	$pdf->multicell(190,10,utf8_decode($_POST['ObjetivoGeneral']),0,'J',0);
	$pdf->Cell(0,5,'',0,1,'L');
	$pdf->Cell(0,10,'ESPECIFICOS:',0,1,'L');
	$pdf->multicell(190,10,utf8_decode($_POST['ObjetivoEspecifico']),0,'J',0);
	$pdf->Cell(0,5,'',0,1,'L');
	$pdf->SetFont('Soberana','Bl',10);
	$pdf->Cell(0,10,'3. Metas',0,1,'L');
	$pdf->SetFont('Soberana','',11);
	$pdf->Cell(0,10,'Grado de cumplimiento de las metas propuestas: '.utf8_decode($_POST['grado']),0,1,'C');
	$pdf->SetFont('Soberana','Bl',9);
	$pdf->Cell(0,10,'Cumplimiento de metas',0,1,'L');
	$pdf->SetFont('Soberana','',9);
	$pdf->multicell(190,10,utf8_decode($_POST['CumplimientoMetas']),0,'J',0);
	$pdf->Cell(0,5,'',0,1,'L');
	$pdf->SetFont('Soberana','Bl',9);
	$pdf->Cell(0,10,'Metas cumplidas',0,1,'L');
	$pdf->SetFont('Soberana','',9);	
	$pdf->multicell(190,10,utf8_decode($_POST['MetasCumplidas']),0,'J',0);
	$pdf->Cell(0,5,'',0,1,'L');

	$pdf->SetFont('Soberana','Bl',10);
	$pdf->Cell(0,10,'4. Metodologia',0,1,'L');
	$pdf->SetFont('Soberana','',9);
	$pdf->Cell(0,10,'Descripcion de la metodologia empleada para el alcance de los objetivos',0,1,'L');
	$pdf->SetFont('Soberana','',10);
	$pdf->multicell(190,10,utf8_decode($_POST['metodologia']),0,'J',0);
	$pdf->Cell(0,5,'',0,1,'L');

	$pdf->SetFont('Soberana','Bl',10);
	$pdf->Cell(0,10,utf8_decode('5. Colaboración y Participación'),0,1,'L');
	$pdf->SetFont('Arial','',6);
	$pdf->multicell(190,10,utf8_decode('Descripción de la participación e integración del grupo de trabajo, indicando el desempeño y las actividades realizadas. Tambien se indica si hubo cambios en la participación de los investigadores, el grado de afectacion del proyecto.'),0,'J',0);
	$pdf->SetFont('Soberana','',9);
	$pdf->cell(0,10,utf8_decode('Integrantes del proyecto'),0,1,'C');
	$pdf->SetFont('Soberana','',9);
	$pdf->multicell(190,10,utf8_decode($_POST['IntegrantesProyecto']),0,'J',0);
	$pdf->Cell(0,5,'',0,1,'L');
	$pdf->SetFont('Soberana','',9);
	$pdf->cell(0,10,utf8_decode('Colaboración con externos'),0,1,'C');
	$pdf->SetFont('Soberana','',9);
	$pdf->multicell(190,10,utf8_decode($_POST['IntegrantesExternos']),0,'J',0);
	$pdf->Cell(0,5,'',0,1,'L');
	$pdf->SetFont('Soberana','',9);
	$pdf->cell(0,10,utf8_decode('Participación de Estudiantes'),0,1,'C');
	$pdf->SetFont('Soberana','',9);
	$pdf->multicell(190,10,utf8_decode($_POST['IntegrantesEstudiantes']),0,'J',0);
	$pdf->Cell(0,5,'',0,1,'L');
	

	$pdf->SetFont('Soberana','Bl',10);
	$pdf->Cell(0,10,utf8_decode('6. Desviaciones y Monto'),0,1,'L');
	$pdf->SetFont('Soberana','',9);
	$pdf->multicell(190,10,utf8_decode($_POST['desviaciones']),0,'J',0);
	$pdf->Cell(0,5,'',0,1,'L');
	$pdf->SetFont('Soberana','Bl',10);
	$pdf->Cell(0,10,'7. Productos Transferidos',0,1,'L');
	$pdf->SetFont('Soberana','',9);
	$pdf->multicell(0,10,utf8_decode($_POST['productos']),0,'J',0);	
	$pdf->Cell(0,5,'',0,1,'L');
	$pdf->SetFont('Soberana','Bl',10);
	$pdf->Cell(0,10,'8. Difusion',0,1,'L');
	$pdf->SetFont('Soberana','',9);
	$pdf->multicell(0,10,utf8_decode($_POST['difusion']),0,'J',0);		
	$pdf->Cell(0,5,'',0,1,'L');

	$pdf->SetFont('Soberana','Bl',10);
	$pdf->Cell(0,10,'9. Recurso Ejercido',0,1,'L');
	$pdf->SetFont('Soberana','',9);
	$pdf->multicell(0,10,'$0.00 PESOS ',0,'J',0);	
	$pdf->Cell(0,5,'',0,1,'L');
	$pdf->SetFont('Soberana','Bl',10);
	$pdf->Cell(0,10,'10. Beneficios y Problemas',0,1,'L');
	$pdf->SetFont('Soberana','',9);
	$pdf->multicell(0,10,utf8_decode($_POST['beneficiosProblemas']),0,'J',0);	
	$pdf->Cell(0,5,'',0,1,'L');
	$pdf->SetFont('Soberana','Bl',10);
	$pdf->Cell(0,10,utf8_decode('11. Información Adicional'),0,1,'L');
	$pdf->SetFont('Soberana','',9);
	$pdf->multicell(0,10,utf8_decode($_POST['InformacionAdicional']),0,'J',0);	
	$pdf->Cell(0,5,'',0,1,'L');
	
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(180,15,'','B',1,'L');
	$pdf->Cell(60,10,'Responsable Tecnico','LR',0,'C');
	$pdf->Cell(60,10,'Jefe de la DEPI o subdirector Academico','LR',0,'C');
	$pdf->Cell(60,10,'Director del plantel','LR',1,'C');
	$pdf->Cell(60,10,'','LR',0,'C');
	$pdf->Cell(60,10,'','LR',0,'C');
	$pdf->Cell(60,10,'','LR',1,'C');
	$pdf->Cell(60,10,'','LR',0,'C');
	$pdf->Cell(60,10,'','LR',0,'C');
	$pdf->Cell(60,10,'','LR',1,'C');
	$pdf->Cell(60,10,'Nombre y Firma','LRB',0,'C');
	$pdf->Cell(60,10,'Nombre y Firma','LRB',0,'C');
	$pdf->Cell(60,10,'Nombre y Firma','LRB',1,'C');

	$pdf->output();
	

?>
