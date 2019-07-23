<?php
session_start();

set_time_limit(0);

if(isset($_GET["pdf"])){
	
		require_once('tcpdf_include.php');

		$get    = $_GET["pdf"];
		$titulo = "";
		
		if(isset($get)) { 
			
			$url    = explode("_", $get); 
			$action = $url[0];
			
			if		(isset($url[4]))	$id = $url[4];
			else if	(isset($url[3]))	$id = $url[3];
			else if	(isset($url[2]))	$id = $url[2];
			else if	(isset($url[1]))	$id = $url[1];

		}
		else $action = "";
		
		if($action == "traspaso-locales")   $titulo = "El TEMPLO DE LA MODA LTDA 805.027.653-7";

	
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetHeaderData('', 0, PDF_HEADER_TITLE."REMISIÓN" , PDF_HEADER_STRING);
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	
		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		
		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		
		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$pdf->setLanguageArray($l);
	}
	
	// ---------------------------------------------------------
	
	
		
	
		// set font
		$pdf->SetFont('dejavusans', '', 10);
		
		// add a page
		$pdf->AddPage();
		$cant = 0;
		$total = 0;
	
		// create some HTML content
		$html="";
	
		
		include '../../../pdf/index.php';
	
		
		

}