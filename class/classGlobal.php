<?php
	
	require_once 'connect/conexion.php';
	require_once 'class.inputfilter.php';
	
	$iFilter = new InputFilter();
	
	class Globals{
		
		
		public static $instancia;
		public $dbh;
		public $iFilter;
		
		public function __construct(){
		
			$this->dbh     = Conexion::singleton_conexion();
			$this->iFilter = new InputFilter();
		}
		
		

 /*************************************************************** Funciones Con BD **************************************************************/		
 	 	
		public function insert_data_array($array, $tabla){

			try {
					
					$query 	= $this->dbh->prepare("SHOW COLUMNS FROM $tabla");
					$query->execute();
					$campos = $query->fetchAll();

					foreach($array as $key => $data){
						
						if($data != '' && $key != 'id'){
						
							foreach($campos as $campo_key => $campo_data){
								
								$existe = array_search($key, $campo_data);
							
								if($existe) {
									
									if($campo_data[1]== "text")		$array_2[$key] = (utf8_decode($data));
									else  							$array_2[$key] = $this->iFilter->process(utf8_decode($data));	
									break;
								}
							}
						}
					}
					
					$array = $array_2;
					
					$fields		= array_keys($array); 
					$values		= array_values($array);
					$fieldlist	= implode(',',$fields); 
					$qs			= str_repeat("?,",count($fields)-1);
					$sql		= "INSERT INTO $tabla ($fieldlist) values(${qs}?)";
					$query 		= $this->dbh->prepare($sql);
					
					if ($query->execute($values) === false) return 0;	/*var_dump($errorcode = $query->errorCode());*/
					else return $this->dbh->UltimoIDInsertado(); 
					
					
			} catch (PDOException $e) { 
			
				$e->getMessage(); 
			}
		}
		
		public function update_data_array($array, $tabla, $campo, $value){

			try {
					
					$cant      = 1;
					$coma      = ", ";
					$fieldlist = "";
					$count     = count($array);
					$array_3   = array();
					
					$query 	= $this->dbh->prepare("SHOW COLUMNS FROM $tabla");
					$query->execute();
					$campos = $query->fetchAll();
					
					foreach($array as $key => $data){
						
						if($data != ''){
						
							foreach($campos as $campo_key => $campo_data){
								
								$existe = array_search($key, $campo_data);
								if($existe) {
									
									if("id" != $campo_key) {
										
										if($campo_data[1]== "longtext")		$array[$key] = (utf8_decode($data));	
										else  								$array[$key] = $this->iFilter->process(utf8_decode($data));	
										
										$array_3[$cant] = $array[$key];
										
										$fieldlist  .= $key." = ?".$coma;
										break;
									}
								}
							}
						}
						$cant++;
					}
					
					$fieldlist = trim($fieldlist, ', ');

					$sql	= "UPDATE $tabla SET $fieldlist WHERE $campo = ?";
					$query 	= $this->dbh->prepare($sql);
					
					

					$i = 1;
					foreach($array_3 as $key => $data){

						$query->bindValue($i, $data);
						$i++;
			
					}

						$query->bindValue($i, $value);
					
					if ($query->execute() === false) return 2;	/*var_dump($errorcode = $query->errorCode());*/
					else return 1; 
					
					
			} catch (PDOException $e) { 
			
				$e->getMessage(); 
			}
		}
		
		public function eliminar_por($tabla, $parametro, $id){
			
			try {
	
				$query = $this->dbh->prepare("DELETE FROM $tabla WHERE $parametro = ?");
				$query->bindParam(1,$id);
	
				if ($query->execute() === false) return 2;
				else 							 return 1;
				
			}catch(PDOException $e){
				
				print "Error!: " . $e->getMessage();
				
			}		
			
		}

		public function eliminar_todo($tabla, $id){
			
			try {
	
				$query = $this->dbh->prepare("DELETE FROM $tabla");
				$query->bindParam(1,$id);
	
				if ($query->execute() === false) return 2;
				else 							 return 1;
				
			}catch(PDOException $e){
				
				print "Error!: " . $e->getMessage();
				
			}		
			
		}
		
		public function eliminar_por_condicion($tabla, $parametro, $id, $condicion){
			
			try {
	
				$query = $this->dbh->prepare("DELETE FROM $tabla WHERE $parametro = ? $condicion");
				$query->bindParam(1,$id);
	
				if ($query->execute() === false) return 2;
				else 							 return 1;
				
			}catch(PDOException $e){
				
				print "Error!: " . $e->getMessage();
				
			}		
			
		}
		
		public function verOpcionesPor($tabla, $condicion, $fetchAll){
		
			try {
	
				$query = $this->dbh->prepare("	
												SELECT
													$tabla.*
												FROM
													$tabla
												WHERE
													1=1 $condicion 
											 ");
				$query->execute();
				
				if($query->rowCount() != 0)	{
					
					if ($fetchAll == 1)	return $query->fetchAll();
					else				return $query->fetch();
				
				}
				else 						return 2;
				
			}catch(PDOException $e){
				
				print "Error!: " . $e->getMessage();
	
			}		
			
		}
		
		public function verPorConsultaPor($sql, $fetchAll){
		
			try {
	
				$query = $this->dbh->prepare($sql);
				$query->execute();
				
				if($query->rowCount() != 0)	{
					
					if ($fetchAll == 1)	return $query->fetchAll();
					else				return $query->fetch();
				
				}
				else 						return 2;
				
			}catch(PDOException $e){
				
				print "Error!: " . $e->getMessage();
	
			}		
			
		}
		
		public function ejecutarConsultarPor($conexion, $instancia, $bd, $usuario, $pass, $consulta, $fetchAll){
		
			try {
				
				set_time_limit(0);
				$db = new PDO(''.$conexion.'='.$instancia.';Database='.$bd,$usuario,$pass);			
				$query = $db->prepare($consulta);
				$query->execute();
				if($query->rowCount() != 0){
					
					if ($fetchAll == 1)	return $query->fetchAll();
					else				return $query->fetch();	
				}
				else return 2;
				
			}catch(PDOException $e){
				
				print "Error!: " . $e->getMessage();
				
			}		
		}
		
		public function ejecutarSpConsultaPor($conexion, $instancia, $bd, $usuario, $pass, $sp, $sql, $fetchAll){
		
			try {
				
				set_time_limit(0);
				$db = new PDO(''.$conexion.'='.$instancia.';Database='.$bd,$usuario,$pass);			
				$query = $db->prepare($sp);
				$query->execute();
				$query->closeCursor();
				$db_2 = new PDO(''.$conexion.'='.$instancia.';Database='.$bd,$usuario,$pass);	
				$query_2 = $db_2->prepare($sql);
				$query_2->execute();
				
				if($query_2->rowCount() != 0){
					
					if ($fetchAll == 1)	return $query_2->fetchAll();
					else				return $query_2->fetch();	
				}
				else return 2;
				
			}catch(PDOException $e){
				
				print "Error!: " . $e->getMessage();
				
			}		
		}
		
		public function llenarCombo($sql, $codigo){
		
			try {
	
				$query = $this->dbh->prepare($sql);
				$query->bindValue(1, $codigo);
				$query->execute();
				
				if($query->rowCount() != 0)	return $query->fetchAll();
				else 						return 2;
				
			}catch(PDOException $e){
				
				print "Error!: " . $e->getMessage();
	
			}		
			
		}
		
		public function cambiarVariables($actual, $nueva, $sql){
	
			$sql = str_replace($actual, $nueva, $sql);
			return $sql;
		
		}
		
		public function subirImagenes($files, $archivo, $directorio){
			
			$i = 0;
			$dirImagen = "../../static-pictures/all/";
			require_once '../../class/resize-class.php';
			
			//foreach($files as $file){
					
				$nombreImg   = explode('.', $_FILES[$archivo]['name']);
				$nombreFinal = rand(30,1)*time().".".$nombreImg[1];
				
				$dirImagen.$nombreFinal;
		
				
				if (move_uploaded_file($_FILES[$archivo]['tmp_name'],$dirImagen.$nombreFinal)){
					
					$oResize = new resize($dirImagen.$nombreFinal);
					
					$oResize -> resizeImage(200, 200, 'crop');
					$oResize -> saveImage("../../static-pictures/".$directorio."/200x200/".$nombreFinal, 100);
					

					return $nombreFinal;
					$i++;
				}
			//}	
			
		}
		
		
		public function subirImagen($files, $directorio){
			
			$i = 0;
			$dirPrin   = "../../static-pictures/";
			$dirImagen = $dirPrin."all/";
			require_once '../../class/resize-class.php';
			
			foreach($files as $file){
					
				$nombreImg   = explode('.', $_FILES['archivo']['name'][$i]);
				$nombreFinal = rand(30,1)*time().".".$nombreImg[1];
				
				$dirImagen.$nombreFinal;
		
				
				if (move_uploaded_file($_FILES['archivo']['tmp_name'][$i],$dirImagen.$nombreFinal)){
					
					$oResize = new resize($dirImagen.$nombreFinal);
					
					$oResize -> resizeImage(173, 102, 'crop');
					$oResize -> saveImage($dirPrin.$directorio."/".$nombreFinal, 100);
			
					return $nombreFinal;
					$i++;
				}
			}	
			
		}
		
		
 /*************************************************************** Funciones SIN BD **************************************************************/

		function urls($texto){
			
				$texto = str_replace("á","a", $texto);
				$texto = str_replace("é","e", $texto);
				$texto = str_replace("í","i", $texto);
				$texto = str_replace("ó","o", $texto);
				$texto = str_replace("ú","u", $texto);
				$texto = str_replace("ñ","n", $texto);
				$texto = str_replace("Á","A", $texto);
				$texto = str_replace("É","E", $texto);
				$texto = str_replace("Í","I", $texto);
				$texto = str_replace("Ó","O", $texto);
				$texto = str_replace("Ú","U", $texto);
				$texto = str_replace("Ñ","N", $texto);
				$texto = str_replace("¿","", $texto);
				$texto = str_replace("¡","", $texto);
				$texto = str_replace("!","", $texto);
				$texto = str_replace("'","", $texto);
				$texto = str_replace('"',"", $texto);
				$texto = str_replace(" ","-", $texto);
				$texto = str_replace("  ","", $texto);
				$texto = str_replace("   ","", $texto);
				$texto = str_replace("    ","", $texto);
				$texto = str_replace("     ","", $texto);
				
				$texto = str_replace("A","a", $texto);
				$texto = str_replace("B","b", $texto);
				$texto = str_replace("C","c", $texto);
				$texto = str_replace("D","d", $texto);
				$texto = str_replace("E","e", $texto);
				$texto = str_replace("F","f", $texto);
				$texto = str_replace("G","g", $texto);
				$texto = str_replace("H","h", $texto);
				$texto = str_replace("I","i", $texto);
				$texto = str_replace("J","j", $texto);
				$texto = str_replace("K","k", $texto);
				$texto = str_replace("L","l", $texto);
				$texto = str_replace("M","m", $texto);
				$texto = str_replace("N","n", $texto);
				$texto = str_replace("O","o", $texto);
				$texto = str_replace("P","p", $texto);
				$texto = str_replace("Q","q", $texto);
				$texto = str_replace("R","r", $texto);
				$texto = str_replace("S","s", $texto);
				$texto = str_replace("T","t", $texto);
				$texto = str_replace("U","u", $texto);
				$texto = str_replace("V","v", $texto);
				$texto = str_replace("W","w", $texto);
				$texto = str_replace("X","x", $texto);
				$texto = str_replace("Y","y", $texto);
				$texto = str_replace("Z","z", $texto);
				
				
				$texto = str_replace(":","-", $texto);
				$texto = str_replace(".","-", $texto);
				$texto = str_replace(",","-", $texto);
				$texto = str_replace("{","", $texto);
				$texto = str_replace("}","", $texto);
				$texto = str_replace("`","", $texto);
				$texto = str_replace("´","", $texto);
				$texto = str_replace("'","-", $texto);
				$texto = str_replace("?","-", $texto);
				$texto = str_replace("¿","-", $texto);
				$texto = str_replace("","-", $texto);
				$texto = str_replace("","-", $texto);
				$texto = str_replace("","-", $texto);
				$texto = str_replace("(","", $texto);
				$texto = str_replace(")","", $texto);
				$texto = str_replace("/","", $texto);
				$texto = str_replace("[","", $texto);
				$texto = str_replace("]","", $texto);
				$texto = str_replace("/","", $texto);
				$texto = str_replace("&","", $texto);
				$texto = str_replace("%","", $texto);
				$texto = str_replace("_","-", $texto);
				$texto = str_replace("&","-", $texto);

				return $texto;
			}	
			
			
		function input_name($texto){
			
				$texto = str_replace("á","a", $texto);
				$texto = str_replace("é","e", $texto);
				$texto = str_replace("í","i", $texto);
				$texto = str_replace("ó","o", $texto);
				$texto = str_replace("ú","u", $texto);
				$texto = str_replace("ñ","n", $texto);
				$texto = str_replace("Á","A", $texto);
				$texto = str_replace("É","E", $texto);
				$texto = str_replace("Í","I", $texto);
				$texto = str_replace("Ó","O", $texto);
				$texto = str_replace("Ú","U", $texto);
				$texto = str_replace("Ñ","N", $texto);
				$texto = str_replace("¿","", $texto);
				$texto = str_replace("¡","", $texto);
				$texto = str_replace("!","", $texto);
				$texto = str_replace("'","", $texto);
				$texto = str_replace('"',"", $texto);
				$texto = str_replace(" ","_", $texto);
				$texto = str_replace("  ","", $texto);
				$texto = str_replace("   ","", $texto);
				$texto = str_replace("    ","", $texto);
				$texto = str_replace("     ","", $texto);
				
				$texto = str_replace("A","a", $texto);
				$texto = str_replace("B","b", $texto);
				$texto = str_replace("C","c", $texto);
				$texto = str_replace("D","d", $texto);
				$texto = str_replace("E","e", $texto);
				$texto = str_replace("F","f", $texto);
				$texto = str_replace("G","g", $texto);
				$texto = str_replace("H","h", $texto);
				$texto = str_replace("I","i", $texto);
				$texto = str_replace("J","j", $texto);
				$texto = str_replace("K","k", $texto);
				$texto = str_replace("L","l", $texto);
				$texto = str_replace("M","m", $texto);
				$texto = str_replace("N","n", $texto);
				$texto = str_replace("O","o", $texto);
				$texto = str_replace("P","p", $texto);
				$texto = str_replace("Q","q", $texto);
				$texto = str_replace("R","r", $texto);
				$texto = str_replace("S","s", $texto);
				$texto = str_replace("T","t", $texto);
				$texto = str_replace("U","u", $texto);
				$texto = str_replace("V","v", $texto);
				$texto = str_replace("W","w", $texto);
				$texto = str_replace("X","x", $texto);
				$texto = str_replace("Y","y", $texto);
				$texto = str_replace("Z","z", $texto);
				
				
				$texto = str_replace(":","_", $texto);
				$texto = str_replace(".","_", $texto);
				$texto = str_replace(",","_", $texto);
				$texto = str_replace("{","", $texto);
				$texto = str_replace("}","", $texto);
				$texto = str_replace("`","", $texto);
				$texto = str_replace("´","", $texto);
				$texto = str_replace("'","_", $texto);
				$texto = str_replace("?","_", $texto);
				$texto = str_replace("¿","_", $texto);
				$texto = str_replace("","_", $texto);
				$texto = str_replace("","_", $texto);
				$texto = str_replace("","_", $texto);
				$texto = str_replace("(","", $texto);
				$texto = str_replace(")","", $texto);
				$texto = str_replace("/","", $texto);
				$texto = str_replace("[","", $texto);
				$texto = str_replace("]","", $texto);
				$texto = str_replace("/","", $texto);
				$texto = str_replace("&","", $texto);
				$texto = str_replace("%","", $texto);
				$texto = str_replace("_","_", $texto);
				$texto = str_replace("&","_", $texto);

				return $texto;
			}		
			
			function back_slash($texto){
			
				$texto = str_replace('\"',"\\\'", $texto);
				return $texto;
			}
		
		
		public function valida_email($email){ 
		  
		  if(preg_match("/^(([A-Za-z0-9]+_+)|([A-Za-z0-9]+\-+)|([A-Za-z0-9]+\.+)|([A-Za-z0-9]+\++))*[A-Za-z0-9]+@((\w+\-+)|(\w+\.))*\w{1,63}\.[a-zA-Z]{2,6}$/", $email)){
				return true;
			} else {
				return false;
			}
		}
		
		public function generaNumero($length){

				$source = '1234567890';
				if($length>0){
	
					$rstr = "";
					$source = str_split($source,1);
					for($i=1; $i<=$length; $i++){
						mt_srand((double)microtime() * 1000000);
						$num = mt_rand(1,count($source));
						$rstr .= $source[$num-1];
				   }
				}
	
				return $rstr;
		}
		
			
		function fecha($fecha){

			$fechaIn = explode(" ", $fecha);
			$fechaF = explode("-", $fechaIn[0]);	
			return $fecha = $fechaF[2]."/".$fechaF[1]."/".$fechaF[0];
		}
		
		function fechaSinHora($fecha){

			$fechaF = explode("-", $fecha);	
			return $fecha = $fechaF[2]."/".$fechaF[1]."/".$fechaF[0];
		}
		
		function hora($fecha){

			$fechaIn = explode(" ", $fecha);
			$fechaIn = explode(".", $fechaIn[1]);
			
			return $fechaIn[0];
		}
		
		function verIDDeURl($url){

			$url = explode("_", $url);
			$id  = $url[1];	
			return $id;
		}

		function verNombreRol($idRol) {
			switch($idrol) {

				case 1: return("Administrador"); break;
				case 2: return("Ejecutivo"); break;
			
			}

		}
		
		function partir_palabra($palabra){

			$pala = explode(" ", $palabra);
			return $palab = $pala[0];
		}
		
		public function verMes($mes){
				
				if($mes == 1)	$mes = "Enero";
				if($mes == 2)	$mes = "Febrero";
				if($mes == 3)	$mes = "Marzo";
				if($mes == 4)	$mes = "Abril";
				if($mes == 5)	$mes = "Mayo";
				if($mes == 6)	$mes = "Junio";
				if($mes == 7)	$mes = "Julio";
				if($mes == 8)	$mes = "Agosto";
				if($mes == 9)	$mes = "Septiembre";
				if($mes == 10)	$mes = "Octubre";
				if($mes == 11)	$mes = "Noviembre";
				if($mes == 12)	$mes = "Diciembre";
		
				return $mes;
				
		}
	
			
		public function agregarMinutosAHora($hora, $minAdd){
			
			$fecha      = date($hora);
			$nuevafecha = strtotime ( '+'.$minAdd.' minute' , strtotime ( $fecha ) ) ;
			return $nuevafecha = date ('G:i', $nuevafecha);
		}
		
		public function dias_transcurridos($fecha_i,$fecha_f){
			
			$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
			$dias 	= abs($dias); $dias = floor($dias);		
			return $dias;
		}
		
		
		public function number_no_format($texto){
			
				$texto = str_replace(".","", $texto);
				$texto = str_replace(",","", $texto);
				$texto = str_replace("'","", $texto);
				
				return $texto;
		}

		public function generarConsecutivoDe($condicion, $separacion, $ceros){
		
			try {
	
				$query = $this->dbh->prepare("SELECT * FROM tipos_documentos WHERE id != '' $condicion");
				$query->execute();
				
				if($query->rowCount() != 0)	{
					
					$tipo        = $query->fetch();
					$codigo      = $tipo["codigo"];
					$consecutivo = intval($tipo["consecutivo"]) + 1;
					
					if($ceros == 1){

						if($consecutivo < 10)		  	$consecutivo  = "0000".$consecutivo;
						else if($consecutivo < 100)	  	$consecutivo  = "000".$consecutivo;
						else if($consecutivo < 1000)	$consecutivo  = "00".$consecutivo;
						else if($consecutivo < 10000)  	$consecutivo  = "0".$consecutivo;
						else if($consecutivo < 100000) 	$consecutivo  = "".$consecutivo;
					}
					
					$query = $this->dbh->prepare("UPDATE tipos_documentos SET consecutivo = '$consecutivo' WHERE id != '' $condicion");
					$query->execute();
					
					if ($query->execute() === false) return 2;	
					else return $codigo.$separacion.$consecutivo;
					
					
						
				}
				
			}catch(PDOException $e){
				
				print "Error!: " . $e->getMessage();
				
			}		
			
		}

		


	
		
		public function total_agrupacion($id, $tipo, $fetchAll, $id_producto){
		
			try {

				if($tipo == 1){

					$sql = "SELECT SUM(total) AS total
							FROM 
							((SELECT COUNT(agrupacion) AS total FROM referencias_kits WHERE id_producto_kit = $id AND agrupacion = 'Principal')
							UNION (SELECT COUNT(DISTINCT agrupacion) AS total FROM referencias_kits WHERE id_producto_kit = $id AND agrupacion != 'Principal')) 
							AS consulta";
				}
				else {

					$con = "";

					if($id_producto != "") $con = " AND producto_id = $id_producto";

					$sql = "SELECT SUM(total) AS total
							FROM 
							((SELECT COUNT(agrupacion) AS total FROM documentos_beneficiarios_productos WHERE id_orden_entrega = $id AND agrupacion = 'Principal' AND id_categoria != 7 $con)
							UNION (SELECT COUNT(DISTINCT agrupacion) AS total FROM documentos_beneficiarios_productos WHERE id_orden_entrega = $id AND agrupacion != 'Principal' AND id_categoria != 7 $con)) 
							AS consulta";
					
				}
				
	
				$query = $this->dbh->prepare($sql);
				$query->execute();
				
				if($query->rowCount() != 0)	{
					
					if ($fetchAll == 1)	return $query->fetchAll();
					else				return $query->fetch();
				
				}
				else 						return 2;
				
			}catch(PDOException $e){
				
				print "Error!: " . $e->getMessage();
	
			}		
			
		}

		public function subirImagen_Intra($files, $directorio){
			
			$i = 0;
			$dirImagen = "../../../stactic-images-intradeco/";
			require_once '../../../ai/class/resize-class.php';
			
			foreach($files as $file){
					
				$nombreImg   = explode('.', $_FILES['archivo']['name'][$i]);
				$nombreFinal = rand(30,1)*time().".".$nombreImg[1];
				
		
				if (move_uploaded_file($_FILES['archivo']['tmp_name'][$i],$dirImagen."all/".$nombreFinal)){
					
					$oResize = new resize($dirImagen."all/".$nombreFinal);
					
					$oResize -> resizeImage(150, 150, 'crop');
					$oResize -> saveImage($dirImagen.$directorio."/150x150/".$nombreFinal, 100);
					
					$oResize -> resizeImage(200, 200, 'crop');
					$oResize -> saveImage($dirImagen.$directorio."/200x200/".$nombreFinal, 100);
					
					return $nombreFinal;
					$i++;
				}
			}	
			
		}

		public function verCupoUsadoTercero($condicion, $fetchAll){
		
			try {
	
				$query = $this->dbh->prepare("	SELECT
													SUM(
														pedDt.cantidad_pedida - pedDt.cantidad_cumplida - pedDt.cantidad_baja
													) AS can_ped, sum(pedDt.sub_pedido) AS cupo_usado
												FROM
													mov_r_pedidos AS pedDt LEFT JOIN mov_pedido AS ped ON pedDt.documento = ped.documento
												WHERE
													pedDt.id != '' $condicion");
				$query->execute();
				
				if($query->rowCount() != 0)	{
					
					if($fetchAll == 1) 			return $query->fetchAll();
					else						return $query->fetch();			
				}
				else 						return 2;
				
			}catch(PDOException $e){
				
				print "Error!: " . $e->getMessage();
	
			}		
			
		}

		public function verCupoUsadoCartera($condicion, $fetchAll){
		
			try {
				$query = $this->dbh->prepare("	SELECT DISTINCT 
													car.cliente,
													(car.valor) AS total_factura,
													(IFNULL(SUM(mrcar.credito), 0)) AS saldo_pagado,
												  (	(car.valor) - (IFNULL(SUM(mrcar.credito), 0))) AS cupo_usado_cartera ,
													DATEDIFF(NOW(), car.fecha_vence) AS dias,
													count(car.valor)
												FROM
													mov_cartera AS car
												LEFT JOIN mov_r_cartera AS mrcar ON car.documento = mrcar.documento_cruce  AND mrcar.tipo_movimiento IN ('Pago factura', 'Devolucion')
												WHERE
													car.id != '' $condicion 
												GROUP BY car.cliente , mrcar.documento_cruce, car.valor
												HAVING ((car.valor) - (IFNULL(SUM(mrcar.credito), 0))) <> 0
													");
				$query->execute();
				
				if($query->rowCount() != 0)	{
					
					
					$saldo = array();
					$saldo["cupo_usado_cartera"] = 0;
					$saldo["dias"] = 0;
					
					foreach($query->fetchAll() as $cupo){
						
						if($cupo["dias"] > 15) $saldo["dias"] = $cupo["dias"];
						
						$saldo["cupo_usado_cartera"] += $cupo["cupo_usado_cartera"];
						
					}
					
					return $saldo;			
				}
				else return 0;
				
			}catch(PDOException $e){
				
				print "Error!: " . $e->getMessage();
	
			}		
			
		}

		public function verConsultaInventarioPor($condicion, $bodega, $fetchAll){
		
			try {

				$b_salida  = "";
				$b_entrada = "";
												
				if($bodega != "") {

					$b_salida  = " AND MRE.bodega_salida = '$bodega'";
					$b_entrada = " AND MRE.bodega_entrada = '$bodega'";
				}								

				$sql = " SELECT MR.codigo, MR.referencia, MR.detalle, 
						(SELECT (IFNULL(SUM(MRE.entrada), 0)) as entrada FROM mov_r AS MRE WHERE MRE.codigo = MR.codigo $b_entrada) AS entrada, 
						(SELECT (IFNULL(SUM(MRE.salida), 0)) as salida FROM mov_r AS MRE WHERE MRE.codigo = MR.codigo $b_salida) AS salida, 
						(SELECT (IFNULL(SUM(MRP.cantidad_pedida - MRP.cantidad_cumplida - MRP.cantidad_baja), 0)) as can_ped FROM mov_r_pedidos AS MRP WHERE MRP.codigo = MR.codigo) AS pedido, 
						((SELECT (IFNULL(SUM(MRE.entrada), 0)) as entrada FROM mov_r AS MRE WHERE MRE.codigo = MR.codigo $b_entrada) - (SELECT (IFNULL(SUM(MRE.salida), 0)) as salida FROM mov_r AS MRE WHERE MRE.codigo = MR.codigo $b_salida)) AS existencias 
						FROM mov_r AS MR LEFT JOIN referencias AS R ON R.codigo = MR.codigo 
						WHERE MR.id != '' $condicion
						GROUP BY MR.codigo, MR.referencia 
						HAVING existencias > 0
						"	; //		
	
				$query = $this->dbh->prepare($sql);
				$query->execute();
				
				if($query->rowCount() != 0)	{
					
					if($fetchAll == 1) 			return $query->fetchAll();
					else						return $query->fetch();			
				}
				else 						return 2;
				
			}catch(PDOException $e){
				
				print "Error!: " . $e->getMessage();
	
			}		
			
		}

		public function verConsultaInventarioPorDashboard($condicion, $bodega, $fetchAll){
		
			try {

				$b_salida  = "";
				$b_entrada = "";
												
				if($bodega != "") {

					$b_salida  = " AND MRE.bodega_salida = '$bodega'";
					$b_entrada = " AND MRE.bodega_entrada = '$bodega'";
				}								

				$sql = " SELECT MR.codigo, MR.referencia, MR.detalle, 
						(SELECT (IFNULL(SUM(MRE.entrada), 0)) as entrada FROM mov_r AS MRE WHERE MRE.codigo = MR.codigo $b_entrada) AS entrada, 
						(SELECT (IFNULL(SUM(MRE.salida), 0)) as salida FROM mov_r AS MRE WHERE MRE.codigo = MR.codigo $b_salida) AS salida, 
						(SELECT (IFNULL(SUM(MRP.cantidad_pedida - MRP.cantidad_cumplida - MRP.cantidad_baja), 0)) as can_ped FROM mov_r_pedidos AS MRP WHERE MRP.codigo = MR.codigo) AS pedido, 
						((SELECT (IFNULL(SUM(MRE.entrada), 0)) as entrada FROM mov_r AS MRE WHERE MRE.codigo = MR.codigo $b_entrada) - (SELECT (IFNULL(SUM(MRE.salida), 0)) as salida FROM mov_r AS MRE WHERE MRE.codigo = MR.codigo $b_salida)) AS existencias 
						FROM mov_r AS MR LEFT JOIN referencias AS R ON R.codigo = MR.codigo 
						WHERE MR.id != '' $condicion
						GROUP BY MR.codigo, MR.referencia						
						ORDER BY  SUM(entrada) desc
						"	; //		
	
				$query = $this->dbh->prepare($sql);
				$query->execute();
				
				if($query->rowCount() != 0)	{
					
					if($fetchAll == 1) 			return $query->fetchAll();
					else						return $query->fetch();			
				}
				else 						return 2;
				
			}catch(PDOException $e){
				
				print "Error!: " . $e->getMessage();
	
			}		
			
		}

		public function verCarteraPor($condicion, $fetchAll){
		
			try {
				
				$sql = "SELECT car.id, car.documento, car.cliente, car.valor, car.valor_pedido, car.saldo AS salto_mov_cartera,
							(car.valor - IFNULL(SUM(mrcar.credito), 0)) AS saldo, car.cerrado, car.tipo_documento,
							car.fecha_documento, car.fecha_vence, car.dcto, mov.neto, mrcar.documento as doc_car,
							mrcar.tipo_movimiento as tip_mov, car.cliente_nombre
						FROM mov_cartera AS car
						LEFT JOIN mov_r_cartera AS mrcar ON car.documento = mrcar.documento_cruce AND car.id_empresa = mrcar.id_empresa
						LEFT JOIN mov AS mov ON car.documento = mov.documento AND car.id_empresa = mov.id_empresa
						WHERE car.id != '' $condicion AND car.id_tipo_documento IN (1, 4)
						GROUP BY car.documento, car.id_empresa
						HAVING IFNULL(SUM(mrcar.credito), 0) <> car.valor
						ORDER BY mov.cliente_nombre, car.fecha_documento DESC";

				$query = $this->dbh->prepare($sql);
				$query->execute();
				
				if($query->rowCount() != 0)	{
					
					if ($fetchAll == 1)	return $query->fetchAll();
					else				return $query->fetch();
				
				}
				else 						return 2;
				
			}catch(PDOException $e){
				
				print "Error!: " . $e->getMessage();
	
			}		
			
		}

		public function verConsecutivo(){
		
			try {
	
				$query = $this->dbh->prepare("SELECT MAX(codigo) as codigo FROM referencias");
				$query->execute();
				$prod = $query->fetch();
				
				
				if($query->rowCount() != 0)	{
					
					$consecutivo = $prod["codigo"] + 1;
					 
					if($consecutivo < 10)		   $codigo  = "00000".$consecutivo;
					else if($consecutivo < 100)	   $codigo  = "0000".$consecutivo;
					else if($consecutivo < 1000)   $codigo  = "000".$consecutivo;
					else if($consecutivo < 10000)  $codigo  = "00".$consecutivo;
					else if($consecutivo < 100000) $codigo  = "0".$consecutivo;
					
					return $codigo;
				}
				else return 2;
				
			}catch(PDOException $e){
				
				print "Error!: " . $e->getMessage();
				
			}		
			
		}

		public function verTotalesMovRPor($condicion, $fetchAll){
		
			try {
	
				$query = $this->dbh->prepare("	SELECT
													SUM(debito) AS t_debito,
													SUM(credito) AS t_credito,
													(SUM(credito) - SUM(debito)) as t_documento
												FROM
													mov_r_cartera
												WHERE
													id != '' $condicion");
				$query->execute();
				
				if($query->rowCount() != 0)	{
					
					if($fetchAll == 1) 			return $query->fetchAll();
					else						return $query->fetch();			
				}
				else 						return 2;
				
			}catch(PDOException $e){
				
				print "Error!: " . $e->getMessage();
	
			}		
			
		}

		public function verSaldoCarteraPor($condicion, $fetchAll){
		
			try {
				
				$query = $this->dbh->prepare("	SELECT DISTINCT 
													car.cliente,
													(car.valor) AS total_factura,
													(IFNULL(SUM(mrcar.credito), 0)) AS saldo_pagado,
												  (	(car.valor) - (IFNULL(SUM(mrcar.credito), 0))) AS cupo_usado_cartera ,
													DATEDIFF(NOW(), car.fecha_vence) AS dias,
													count(car.valor)
												FROM
													mov_cartera AS car
												LEFT JOIN mov_r_cartera AS mrcar 
												ON car.documento = mrcar.documento_cruce  AND mrcar.tipo_movimiento IN ('Pago factura', 'Devolucion')
												AND car.id_empresa = mrcar.id_empresa
												WHERE
													car.id != '' $condicion 
												GROUP BY car.cliente , mrcar.documento_cruce, car.valor
												HAVING ((car.valor) - (IFNULL(SUM(mrcar.credito), 0))) <> 0
													");
				$query->execute();
				
				if($query->rowCount() != 0)	{
					
					if($fetchAll == 1) 			return $query->fetchAll();
					else						return $query->fetch();			
				}
				else 						return 2;
				
			}catch(PDOException $e){
				
				print "Error!: " . $e->getMessage();
	
			}		
			
		}

		public function verMovCarteraPor($condicion, $fetchAll){
		
			try {
				
				// SIIII LA USOOOO, NO LA PUEDO BORRAAAAAR
	
				$query = $this->dbh->prepare("	SELECT * FROM mov_cartera WHERE id != '' $condicion");
				$query->execute();
				
				if($query->rowCount() != 0)	{
					
					if($fetchAll == 1) 			return $query->fetchAll();
					else						return $query->fetch();			
				}
				else 						return 2;
				
			}catch(PDOException $e){
				
				print "Error!: " . $e->getMessage();
	
			}		
			
		}

		public function subirImagenesReferencia($files, $codigo, $usuario, $id_usuario, $id_empresa){
			
			$i = 0;
			$dirImagen = "../../static-pictures/all/";
			require_once '../../class/resize-class.php';
			
			foreach($files as $file){
					
				$nombreImg   = explode('.', $_FILES['archivo']['name'][$i]);
				$nombreFinal = rand(30,1)*time().".".$nombreImg[1];
				
				if (move_uploaded_file($_FILES['archivo']['tmp_name'][$i],$dirImagen.$nombreFinal)){
					
					$oResize = new resize($dirImagen.$nombreFinal);
					$immm = getimagesize($dirImagen.$nombreFinal);

					$oResize -> resizeImage(370, 500, 'crop');
					$oResize -> saveImage("../../static-pictures/products/370x500/".$nombreFinal, 100);

					$oResize -> resizeImage(200, 200, 'crop');
					$oResize -> saveImage("../../static-pictures/products/200x200/".$nombreFinal, 100);
					
					
					
					$query = $this->dbh->prepare("INSERT INTO referencias_imagenes ( codigo, imagen, creado_por, id_usuario_creador, id_empresa,  fecha_registro) VALUES ('$codigo', '$nombreFinal', '$usuario', $id_usuario, $id_empresa, NOW())");
					if($query->execute() === TRUE) $mensaje = 1;
					else return 2;

					$i++;
				}
			}
					return $mensaje;	
			
		}

		public function dia($dia){
			
				if ($dia=="Monday") 	$dia="Lunes";
				if ($dia=="Tuesday") 	$dia="Martes";
				if ($dia=="Wednesday") 	$dia="Miércoles";
				if ($dia=="Thursday") 	$dia="Jueves";
				if ($dia=="Friday") 	$dia="Viernes";
				if ($dia=="Saturday") 	$dia="Sábado";
				if ($dia=="Sunday") 	$dia="Domingo";

				return $dia;
		}
	
	}					
?>