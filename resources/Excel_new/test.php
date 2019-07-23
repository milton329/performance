<?php
/**
 * XLS parsing uses php-excel-reader from http://code.google.com/p/php-excel-reader/
 */

	require '../class/classGlobal.php';
	require '../class/classGlobalEmpresa.php';

	$oGlobals  = new Globals();
	$oGlobalsE = new Globals_Empresa();

	header('Content-Type: text/plain');

	if (isset($argv[1]))
	{
		$Filepath = $argv[1];
	}
	elseif (isset($_GET['File']))
	{
		$Filepath = $_GET['File'];
	}
	else
	{
		if (php_sapi_name() == 'cli')
		{
			echo 'Please specify filename as the first argument'.PHP_EOL;
		}
		else
		{
			echo 'Please specify filename as a HTTP GET parameter "File", e.g., "/test.php?File=test.xlsx"';
		}
		exit;
	}

	// Excel reader from http://code.google.com/p/php-excel-reader/
	require('php-excel-reader/excel_reader2.php');
	require('SpreadsheetReader.php');

	date_default_timezone_set('UTC');

	$StartMem = memory_get_usage();

	try
	{
		$Spreadsheet = new SpreadsheetReader($Filepath);
		$BaseMem = memory_get_usage();

		$Sheets = $Spreadsheet -> Sheets();

		foreach ($Sheets as $Index => $Name)
		{

			$Time = microtime(true);

			$Spreadsheet -> ChangeSheet($Index);

			foreach ($Spreadsheet as $Key => $Row)
			{
				echo $Key.': ';
				if ($Row)
				{
					print_r($Row);
					
					
						$array['NUMEROTITULOVALOR'] 			= $Row[0];
						/*$array['FECHAELABORACION'] 			= $Row[1];*/
						$array['VALOR'] 						= $Row[2];
						/*$array['FECHAVENCIMIENTO'] 			= $Row[2];*/
						$array['DIASMORA'] 						= $Row[4];
						$array['TIPODOC'] 						= $Row[5];
						$array['NRODOC'] 						= $Row[6];
						$array['PRIMERNOMBRE'] 					= $Row[7];
						$array['SEGUNDONOMBRE'] 				= $Row[8];
						$array['PRIMERAPELLIDO'] 				= $Row[9];
						$array['SEGUNDOAPELLIDO'] 				= $Row[10];
						$array['DIRECCIONRESIDENCIA'] 			= $Row[11];
						$array['CIUDAD'] 						= $Row[12];
						$array['DEPTO'] 						= $Row[13];
						$array['TELEFONO1'] 					= $Row[14];
						$array['TELEFONO2'] 					= $Row[15];
						$array['TELEFONO3'] 					= $Row[16];
						$array['CELULAR1'] 						= $Row[17];
						$array['CELULAR2'] 						= $Row[18];
						$array['CORREOELECTRONICO1'] 			= $Row[19];
						$array['CORREOELECTRONICO2'] 			= $Row[20];
						$array['DIRECCIONLABORAL'] 				= $Row[21];
						$array['TELEFONOLABORAL'] 				= $Row[22];
						$array['CODEUDOR1CEDULA'] 				= $Row[23];
						$array['CODEUDOR1PRIMERNOMBRE'] 		= $Row[24];
						$array['CODEUDOR1SEGUNDONOMBRE'] 		= $Row[25];
						$array['CODEUDOR1PRIMERAPELLIDO'] 		= $Row[26];
						$array['CODEUDOR1SEGUNDOAPELLIDO'] 		= $Row[27];
						$array['CODEUDOR1DIRECCIONRESIDENCIA'] 	= $Row[28];
						$array['CODEUDOR1CIUDAD'] 				= $Row[29];
						$array['CODEUDOR1DEPTO'] 				= $Row[30];
						$array['CODEUDOR1TELEFONO1'] 			= $Row[31];
						$array['CODEUDOR1TELEFONO2'] 			= $Row[32];
						$array['CODEUDOR1TELEFONO3'] 			= $Row[33];
						$array['CODEUDOR1CELULAR1'] 			= $Row[34];
						$array['CODEUDOR1CELULAR2'] 			= $Row[35];
						$array['CODEUDOR1CORREOELECTRONICO1'] 	= $Row[36];
						$array['CODEUDOR1CORREOELECTRONICO2'] 	= $Row[37];
						$array['CODEUDOR1DIRECCIONLABORAL'] 	= $Row[38];
						$array['CODEUDOR1TELEFONOLABORAL'] 		= $Row[39];
						$array['CODEUDOR2CEDULA'] 				= $Row[40];
						$array['CODEUDOR2PRIMERNOMBRE'] 		= $Row[41];
						$array['CODEUDOR2SEGUNDONOMBRE'] 		= $Row[42];
						$array['CODEUDOR2PRIMERAPELLIDO'] 		= $Row[43];
						$array['CODEUDOR2SEGUNDOAPELLIDO'] 		= $Row[44];
						$array['CODEUDOR2DIRECCIONRESIDENCIA'] 	= $Row[45];
						$array['CODEUDOR2CIUDAD'] 				= $Row[46];
						$array['CODEUDOR2DEPTO'] 				= $Row[47];
						$array['CODEUDOR2TELEFONO1'] 			= $Row[48];
						$array['CODEUDOR2TELEFONO2'] 			= $Row[49];
						$array['CODEUDOR2TELEFONO3'] 			= $Row[50];
						$array['CODEUDOR2CELULAR1'] 			= $Row[51];
						$array['CODEUDOR2CELULAR2'] 			= $Row[52];
						$array['CODEUDOR2CORREOELECTRONICO1'] 	= $Row[53];
						$array['CODEUDOR2CORREOELECTRONICO2'] 	= $Row[54];
						$array['CODEUDOR2DIRECCIONLABORAL'] 	= $Row[55];
						$array['CODEUDOR2TELEFONOLABORAL'] 		= $Row[56];
						$array['CODEUDOR3CEDULA'] 				= $Row[57];
						$array['CODEUDOR3PRIMERNOMBRE'] 		= $Row[58];
						$array['CODEUDOR3SEGUNDONOMBRE'] 		= $Row[59];
						$array['CODEUDOR3PRIMERAPELLIDO'] 		= $Row[60];
						$array['CODEUDOR3SEGUNDOAPELLIDO'] 		= $Row[61];
						$array['CODEUDOR3DIRECCIONRESIDENCIA'] 	= $Row[62];
						$array['CODEUDOR3CIUDAD'] 				= $Row[63];
						$array['CODEUDOR3DEPTO']				= $Row[64];
						$array['CODEUDOR3TELEFONO1'] 			= $Row[65];
						$array['CODEUDOR3TELEFONO2'] 			= $Row[66];
						$array['CODEUDOR3TELEFONO3'] 			= $Row[67];
						$array['CODEUDOR3CELULAR1'] 			= $Row[68];
						$array['CODEUDOR3CELULAR2'] 			= $Row[69];
						$array['CODEUDOR3CORREOELECTRONICO1'] 	= $Row[70];
						$array['CODEUDOR3CORREOELECTRONICO2'] 	= $Row[71];
						$array['CODEUDOR3DIRECCIONLABORAL'] 	= $Row[72];
						$array['CODEUDOR3TELEFONOLABORAL'] 		= $Row[73];


						$insert = $oGlobals->insert_data_array_condition("sqlsrv:Server", "ZEUS\LOSANGELES", "BdSistemaTemplo", "sofadcob", "sofadco123", $array, "Creditemplo");

				}
				else
				{
					var_dump($Row);
				}
				$CurrentMem = memory_get_usage();
		
		
				if ($Key && ($Key % 500 == 0))
				{

				}
			}
		
		}
		
	}
	catch (Exception $E)
	{
		echo $E -> getMessage();
	}
?>
