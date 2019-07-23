<?php
	
	require_once 'connect/conexion_empresa.php';
	require_once 'class.inputfilter.php';
	
	$iFilter = new InputFilter();
	
	class Globals_Empresa{
		
		
		public static $instancia;
		public $dbh;
		public $iFilter;
		
		public function __construct(){
		
			$this->dbh     = Conexion_Empresa::singleton_conexion();
			$this->iFilter = new InputFilter();
		}
		
		

 /*************************************************************** Funciones Con BD **************************************************************/		
 	 	
		/*public function insert_data_array($array, $tabla){

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
					
					if ($query->execute($values) === false) return 0;
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
					
					$query 	= $this->dbh->prepare("SHOW COLUMNS FROM $tabla");
					$query->execute();
					$campos = $query->fetchAll();
					
					foreach($array as $key => $data){
						
						if($data != ''){
						
							foreach($campos as $campo_key => $campo_data){
								
								$existe = array_search($key, $campo_data);
								if($existe) {
									
									if("id" != $campo_key) {
										
										if($campo_data[1]== "text")		$array[$key] = (utf8_decode($data));	
										else  							$array[$key] = $this->iFilter->process(utf8_decode($data));	
										
										$fieldlist  .= $key." = '".$array[$key]."'".$coma;
										break;
									}
								}
							}
						}
						$cant++;
					}
					
					$fieldlist = trim($fieldlist, ', ');

					$sql	= "UPDATE $tabla SET $fieldlist WHERE $campo = $value";
					$query 	= $this->dbh->prepare($sql);
					
					if ($query->execute() === false) return 2;
					else return 1; 
					
					
			} catch (PDOException $e) { 
			
				$e->getMessage(); 
			}
		} */
		
		
		public function insert_data_array($array, $tabla){

			try {

					$query 	= $this->dbh->prepare("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME  = '$tabla'");
					$query->execute();
					$campos = $query->fetchAll();

					foreach($array as $key => $data){
						
						foreach($campos as $campo_key => $campo_data){
							
							$existe = array_search($key, $campo_data);
						
							if($existe) {
								
								if($data != ""){
								
									if("id" != $key && "ID" != $key ) {
								
										$array_2[$key] = $this->iFilter->process(($data));	
										break;
									}
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
					
					$query 	= $this->dbh->prepare("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME  = '$tabla'");
					$query->execute();
					$campos = $query->fetchAll();
					
					foreach($array as $key => $data){
						
						if($data != ''){
						
							foreach($campos as $campo_key => $campo_data){
								
								$existe = array_search($key, $campo_data);
								if($existe) {
									
									if("id" != $key && "ID" != $key ) {
									
										$array[$key] = $this->iFilter->process(utf8_decode($data));	
										$fieldlist  .= $key." = '".$array[$key]."'".$coma;
										break;
									}
								}
							}
						}
						$cant++;
					}
					
					$fieldlist = trim($fieldlist, ', ');

					$sql	= "UPDATE $tabla SET $fieldlist WHERE $campo = '$value'";
					$query 	= $this->dbh->prepare($sql);
					
					if ($query->execute() === false) return 2;	/*var_dump($errorcode = $query->errorCode());*/
					else return 1; 
					
					
			} catch (PDOException $e) { 
			
				$e->getMessage(); 
			}
		}
		
		public function update_data_array_condition($array, $tabla, $campo, $value, $condition){

			try {
					
					$cant      = 1;
					$coma      = ", ";
					$fieldlist = "";
					$count     = count($array);
					
					$query 	= $this->dbh->prepare("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME  = '$tabla'");
					$query->execute();
					$campos = $query->fetchAll();
					
					foreach($array as $key => $data){
						
						if($data != ''){
						
							foreach($campos as $campo_key => $campo_data){
								
								$existe = array_search($key, $campo_data);
								if($existe) {
									
									if("id" != $key && "ID" != $key ) {
									
										$array[$key] = $this->iFilter->process(utf8_decode($data));	
										$fieldlist  .= $key." = '".$array[$key]."'".$coma;
										break;
									}
								}
							}
						}
						$cant++;
					}
					
					$fieldlist = trim($fieldlist, ', ');

					$sql	= "UPDATE $tabla SET $fieldlist WHERE $campo = '$value' $condition";
					$query 	= $this->dbh->prepare($sql);
					
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
		
		public function subirImagen($files, $directorio){
			
			$i = 0;
			$dirImagen = "../../static-pictures/all/";
			require_once '../../class/resize-class.php';
			
			foreach($files as $file){
					
				$nombreImg   = explode('.', $_FILES['archivo']['name'][$i]);
				$nombreFinal = rand(30,1)*time().".".$nombreImg[1];
				
				$dirImagen.$nombreFinal;
		
				
				if (move_uploaded_file($_FILES['archivo']['tmp_name'][$i],$dirImagen.$nombreFinal)){
					
					$oResize = new resize($dirImagen.$nombreFinal);
					
					$oResize -> resizeImage(200, 200, 'crop');
					$oResize -> saveImage("../../static-pictures/".$directorio."/200x200/".$nombreFinal, 100);
					
	
					return $nombreFinal;
					$i++;
				}
			}	
			
		}
		
		public function subirImagenSlider($files, $directorio){
			
			$i = 0;
			$dirImagen = "../../static-pictures-fenix/all/";
			require_once '../../class/resize-class.php';
			
			foreach($files as $file){
					
				$nombreImg   = explode('.', $_FILES['archivo']['name'][$i]);
				$nombreFinal = rand(30,1)*time().".".$nombreImg[1];
				
				$dirImagen.$nombreFinal;
		
				
				if (move_uploaded_file($_FILES['archivo']['tmp_name'][$i],$dirImagen.$nombreFinal)){
					
					$oResize = new resize($dirImagen.$nombreFinal);
					
					$oResize -> resizeImage(320, 280, 'crop');
					$oResize -> saveImage("../../static-pictures-fenix/".$directorio."/320x280/".$nombreFinal, 100);
					
					$oResize -> resizeImage(320, 560, 'crop');
					$oResize -> saveImage("../../static-pictures-fenix/".$directorio."/320x560/".$nombreFinal, 100);

					return $nombreFinal;
					$i++;
				}
			}	
			
		}
		
		public function subirImagenNews($files, $directorio){
			
			$i = 0;
			$dirImagen = "../../static-pictures-fenix/all/";
			require_once '../../class/resize-class.php';
			
			foreach($files as $file){
					
				$nombreImg   = explode('.', $_FILES['archivo']['name'][$i]);
				$nombreFinal = rand(30,1)*time().".".$nombreImg[1];
				
				$dirImagen.$nombreFinal;
		
				
				if (move_uploaded_file($_FILES['archivo']['tmp_name'][$i],$dirImagen.$nombreFinal)){
					
					$oResize = new resize($dirImagen.$nombreFinal);
					
					$oResize -> resizeImage(750, 380, 'crop');
					$oResize -> saveImage("../../static-pictures-fenix/".$directorio."/750x380/".$nombreFinal, 100);
										

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
		
		
		

			
	}					
?>