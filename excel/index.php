<?php
session_start();

	if(isset($_GET["excel"])){
		
		
			header("Content-Type: application/vnd.ms-excel; charset=ISO 8859-1");
			header("Content-type: application/x-msexcel; charset=utf-8");
			
			header('Content-Type: text/html; charset=ISO 8859-1'); 
			
			header("Content-Type: application/vnd.ms-excel");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("content-disposition: attachment;filename=".$_GET["excel"]."_".date('Y-m-d h:m:s').".xls");

			
			require_once('../class/classGlobal.php');
			

			$oGlobals = new Globals();
			
			 $titulo = explode ("_", $_GET["excel"]);
			
			 $titulo[0];
			 
			 $excel = 1;
			
			if($titulo[0] == "informe")	{ 
				
				$id = $titulo[1];
				
				$titulos  = $oGlobals->verOpcionesPor("informes_titulos", " AND id_informe = $id ORDER BY id ASC", 1);
				$consulta = $_SESSION["consulta_informe"];
				include '../informes/tablas/tabla-informes.php';
			
			}
			
			
	}

?>
	
    
    