<?php
session_start();
		
	if(trim($_POST["text_cliente"])){	
	

		require_once('../../class/classGlobal.php');

		$oGlobals = new Globals();

		$usuario    = explode("-", $oGlobals->iFilter->process($_POST["text_cliente"]));
        $usuario_id = $usuario[0];
        //consultar rol del usuario
        $consulta_rol 	= "SELECT id_rol FROM config_usuarios where id='".$usuario_id."'";			
		$consulta_roll 	= $oGlobals->verPorConsultaPor($consulta_rol, 0);
		$usuario_rol	=$consulta_roll[0];
        
        //verificar competencias
        $sql              = "SELECT * FROM tipos_competencias";			
        $competencias     = $oGlobals->verPorConsultaPor($sql, 1);
        foreach($competencias as $competencia){
        $tipo_competencia =$competencia["tipo"];
        $id_tipo_origen   =$competencia["id"];
        //verificar si tiene documentos abiertos por cada competencia
        	$sql2 = "SELECT * FROM mov where tipo_documento='".$tipo_competencia."' and cerrado>0 and id_usuario='".$usuario_id."'";			
        	$documentos_abiertos = $oGlobals->verPorConsultaPor($sql2, 0);
        	$documentos_abiertos_id=$documentos_abiertos[0];
        	$documentos_abiertos_codigo=$documentos_abiertos[1];
        	if ($documentos_abiertos_id!= "")
	        {   
	        	//si hay documentos abiertos
	        ?>
                <div class="col-md-4"><a href="#" class="box bg-danger"><div class="box-cell p-a-3 valign-middle">
                <i class="box-bg-icon middle right fa fa-times"></i>              
                <div class="col-md-12">
                <center><span><b>HAY DOCUMENTOS ABIERTOS ! <br> DOCUMENTO : <?=$documentos_abiertos_codigo;?> </b></span></center>
                </div></div></a></div>
                <?php
	        }
	        if ($documentos_abiertos_id== "")
	        {   
	        	//no hay documentos abiertos, proceder con la creacion de los documentos
	        	$con_emp = " AND id_empresa = '1'";
                $documento = $oGlobals->generarConsecutivoDe(" AND id_tipo_origen = $id_tipo_origen ".$con_emp , "-", 1);

	            $_POST["documento"] 				= $documento;
	            $_POST["valor"] 				    = '0';
	            $_POST["id_tipo_documento"]			= $id_tipo_origen;
				$_POST["tipo_documento"]			= $tipo_competencia;
				$_POST["cerrado"]   				= 1;
				$_POST["id_usuario"]             	= $usuario_id;
				$_POST["fecha_documento"]          	= date("Y-m-d h:i:s");
				$_POST['creado_por'] 				= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
				$_POST['id_usuario_creador'] 		= $_SESSION['idUsuario'];
				$_POST['id_empresa'] 				= $_SESSION["id_empresa"];
				$_POST['fecha_registro'] 			= date("Y-m-d h:i:s");
				$_POST['periodo'] 					= date("m");
				$_POST['year'] 						= date("Y");

				$array = $_POST;
                $insert = $oGlobals->insert_data_array($array, "mov");
                //mensaje de se creo correctamente el documento
                ?>
                <div class="col-md-4"><a href="#" class="box bg-success"><div class="box-cell p-a-3 valign-middle">
                <i class="box-bg-icon middle right fa fa-check"></i>              
                <div class="col-md-12">
                <center><span><b>CREACIÓN EXITOZA ! <br> DOCUMENTO : <?=$documento;?> </b></span></center>
                </div></div></a></div>
                <?php
                //consultar competencias primarias
		        $sql3 = "SELECT * FROM competencias_1 where tipo='".$tipo_competencia."' and id_rol='".$usuario_rol."'";			
		        $competencias1 = $oGlobals->verPorConsultaPor($sql3, 1);
		        foreach($competencias1 as $competencia1){
		        $id_competencia1	 =$competencia1["id"];                
                //verificar si hay datos en la competencias_1 o no para crear
	                if ($id_competencia1!= ""){
	                    $_POST["documento"] 				= $documento;
			            $_POST["id_competencias_1"]			= $id_competencia1;
						$_POST["valor_usuario"]   			= '0';
						$_POST["valor_usuario_califica"]   	= '0';
						$_POST["id_usuario"]             	= $usuario_id;
						$_POST['creado_por'] 				= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
						$_POST['id_usuario_creador'] 		= $_SESSION['idUsuario'];
						$_POST['id_empresa'] 				= $_SESSION["id_empresa"];
						$_POST['fecha_registro'] 			= date("Y-m-d h:i:s");					

						$array = $_POST;
		                $insert = $oGlobals->insert_data_array($array, "auto_evaluaciones");
	                    
	                    //consultar id de la autoevaluacion
	                    $id_autoe = "SELECT id FROM auto_evaluaciones where documento='".$documento."'
	                    and id_competencias_1='".$id_competencia1."'";			
						$id_autoeva 		= $oGlobals->verPorConsultaPor($id_autoe, 0);
					    $id_autoevalucion	=$id_autoeva[0];

	                    //consultar competencias secundarias
	                    $sql4 = "SELECT * FROM competencias_2 where id_competencias_1='".$id_competencia1."' and id_rol='".$usuario_rol."'";			
				        $competencias2 = $oGlobals->verPorConsultaPor($sql4, 1); 
				        // no obligar a entrar el ciclo si no es necesario
				        if (count($competencias2)!=1){
				        	foreach($competencias2 as $competencia2){
							            $_POST["id_competencias_2"]			= $competencia2["id"];
							            $_POST["id_autoevaluaciones"]       = $id_autoevalucion;
										$_POST["valor_usuario"]   			= '0';
										$_POST["valor_usuario_califica"]   	= '0';
										$_POST['creado_por'] 				= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
										$_POST['id_usuario_creador'] 		= $_SESSION['idUsuario'];
										$_POST['id_empresa'] 				= $_SESSION["id_empresa"];
										$_POST['fecha_registro'] 			= date("Y-m-d h:i:s");					

										$array = $_POST;
						                $insert = $oGlobals->insert_data_array($array, "auto_evaluaciones_r");
			                } 
				        }
				    }
	            }            
            }
        }
	}
	else echo "<div class='error'>Debes ingresar compos obligatorios</div>";	

?>
