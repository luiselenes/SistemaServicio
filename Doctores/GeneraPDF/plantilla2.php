<?php
	require 'fpdf/fpdf.php';
	class PDF extends FPDF
	{	
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pag. '.$this->PageNo().'',0,0,'R' );
		}
			
	}
?>