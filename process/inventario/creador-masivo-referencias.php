<?php session_start();
	
	if(isset($_FILES['archivo']['name']) && $_FILES['archivo']['name'] != ""){
	
			$nombre    = $_FILES['archivo']['name'];
			$temporal  = $_FILES['archivo']['tmp_name'];
			$nombre    = explode(".", $nombre);

			if($nombre[1] == "xls" || $nombre[1] == "xlsx"){

				require_once('../../class/classGlobal.php');
				//require_once '../../resources/Excel/PHPExcel.php';
				require('../../resources/Excel_new/php-excel-reader/excel_reader2.php');
				require('../../resources/Excel_new/SpreadsheetReader.php');
				

				$oGlobals    = new Globals();
				
				//$objPHPExcel = PHPExcel_IOFactory::load($temporal);


				$nombreFinal = "excel_".rand(30,1)*time().".".$nombre[1];
				$dirPrin     = "../../static-pictures/excel/";


				if (move_uploaded_file($_FILES['archivo']['tmp_name'],$dirPrin.$nombreFinal)){
					
					$StartMem = memory_get_usage();

					try
					{
						$Filepath = $dirPrin.$nombreFinal;
						$format = "Ymd";
						
						$Spreadsheet = new SpreadsheetReader($Filepath);
						$BaseMem = memory_get_usage();

						$Sheets = $Spreadsheet->Sheets();

						$cant = 1;

						foreach ($Sheets as $Index => $Name)
						{

							$Time = microtime(true);

							$Spreadsheet -> ChangeSheet($Index);

							foreach ($Spreadsheet as $Key => $Row)
							{
								if($cant > 1){
									if ($Row)
									{
										if($Row[0] == 0){

											$array['codigo'] 				= $oGlobals->verConsecutivo();
											$array['referencia'] 			= $Row[1];
											$array['nombre'] 				= utf8_encode($Row[2]);
											$array['nombre_importado'] 		= utf8_encode($Row[3]);
											$array['id_linea'] 				= utf8_encode($Row[4]);
											$array['id_marca'] 				= utf8_encode($Row[5]);
											$array['id_medida'] 			= utf8_encode($Row[6]);
											$array['id_categoria'] 			= utf8_encode($Row[7]);
											$array['IVA'] 					= utf8_encode($Row[8]);
											$array['cantidad_por_bulto'] 	= utf8_encode($Row[9]);
											$array['display'] 				= utf8_encode($Row[10]);
											$array['id_proveedor'] 			= utf8_encode($Row[11]);
											$array['cubicaje'] 				= $Row[12];
											$array['costo'] 				= $oGlobals->number_no_format(number_format($Row[13], 0, "", "."));
											$array['creado_por'] 			= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
											$array['id_usuario_creador'] 	= $_SESSION['idUsuario'];
											$array['id_empresa'] 			= 1;
											$array['fecha_registro'] 		= date("Y-m-d h:i:s");

											// $insert = $oGlobals->insert_data_array($array, "referencias");
											$insert = $oGlobals->insert_data_array($array, "".$proveedor."");
											
											if(!empty($Row[14])){

												$p_arr["codigo"]				= $array['codigo'];
												$p_arr["lista"]   				= "01";
												$p_arr["precio"]  				= $oGlobals->number_no_format(number_format($Row[14], 0, "", "."));
												$p_arr["activo"]  				= 1;
												$p_arr["talla"]   				= "U";
												$p_arr['creado_por'] 			= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
												$p_arr['id_usuario_creador'] 	= $_SESSION['idUsuario'];
												$p_arr['id_empresa'] 			= 1;
												$p_arr['fecha_registro'] 		= date("Y-m-d h:i:s");

											}

											if(!empty($Row[15])){

												$p_arr2["codigo"]				= $array['codigo'];
												$p_arr2["lista"]                = "02";	
												$p_arr2["precio"]               = $oGlobals->number_no_format(number_format($Row[15], 0, "", "."));
												$p_arr2["activo"]  				= 1;
												$p_arr2["talla"]   				= "U";
												$p_arr2['creado_por'] 			= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
												$p_arr2['id_usuario_creador'] 	= $_SESSION['idUsuario'];
												$p_arr2['id_empresa'] 			= 1;
												$p_arr2['fecha_registro'] 		= date("Y-m-d h:i:s");

											}

											if(!empty($Row[14])) $insert = $oGlobals->insert_data_array($p_arr, "precios");
											if(!empty($Row[15])) $insert = $oGlobals->insert_data_array($p_arr2, "precios");
										
											
											/*$p_arr3["id_entrada"] 			= 1;
											$p_arr3["documento"] 			= "SI-00001";
											$p_arr3["tipo_documento"] 		= "SI";
											$p_arr3["codigo"] 				= $array['codigo'];
											$p_arr3["referencia"] 			= $array['referencia'];
											$p_arr3["detalle"] 				= utf8_encode($Row[1]);;
											$p_arr3["salida"] 				= "0";
											$p_arr3["entrada"] 				= $oGlobals->number_no_format($Row[0]);
											$p_arr3["valor_unitario"] 		= $array['costo'];
											$p_arr3["sub_total"] 			= $array['costo'] * $p_arr3["entrada"];
											$p_arr3["periodo"] 				= 1;
											$p_arr3["year"] 				= 2018;
											$p_arr3["costo"] 				= $array['costo'];
											$p_arr3["bodega_entrada"] 		= "01";
											$p_arr3["bodega_salida"] 		= "";
											$p_arr3['creado_por'] 			= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
											$p_arr3['id_usuario_creador'] 	= $_SESSION['idUsuario'];
											$p_arr3['id_empresa'] 			= $_SESSION["id_empresa"];
											$p_arr3['fecha_registro'] 		= date("Y-m-d h:i:s");

											$insert = $oGlobals->insert_data_array($p_arr3, "mov_r");*/
											


										}
									}
								}

								$cant++;
							}

						}

					}
					catch (Exception $E)
					{
						echo $E -> getMessage();
					}
					
					if($insert != 0)  {

						//$sql = "exec Sp__Creditos_Calcula_Cuota";
						//$sp = $oGlobals->ejecutarConsultarPor("sqlsrv:Server", "ZEUS\LOSANGELES", "BdSistemaTemplo", "sofadcob", "sofadco123", $sql, 0);
						
						echo "<div class='exito'>La información se ha subido exitosamente</div>";
						//echo "<center><a href='../excel/descargar-archivo-creditemplo.html'><strong>Descargar archivo</strong></a></center>";
						
					}
					else echo  "<div class='error'>No se ha podido subir la información</div>";

				}
			}
			else echo '<div class="error">El archivo no tiene un formato de excel válido</div>';		
	}
	else echo '<div class="error">Debes elegir un archivo</div>';

?>
