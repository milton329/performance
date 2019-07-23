<?php
session_start();
			
	if(trim($_POST['id_empresa']) != "" && trim($_POST['detalle']) != "" && trim($_POST['fecha_documento']) != "" && trim($_POST['id_tipo_documento']) != ""){
							
		
		require_once '../../class/classGlobal.php';
		
		$oGlobals = new Globals();	

		$con_emp    = "";

		
		$id_empresa = $oGlobals->iFilter->process($_POST['id_empresa']);
		$id     	= $oGlobals->iFilter->process($_POST['id']);
		$cliente_id = $oGlobals->iFilter->process($_POST['cliente_id']);
		$id_tipo    = $oGlobals->iFilter->process($_POST['id_tipo_documento']);
		$fecha      = explode("-", $oGlobals->iFilter->process($_POST['fecha_documento']));

		$con_emp = " AND id_empresa = ".$id_empresa; 

		$insert = 0;
		$update = 2;
		
		$con_emp = " AND id_empresa = ".$id_empresa;

		$tipo_doc = $oGlobals->verOpcionesPor("tipos_documentos", " AND id_tipo_origen = $id_tipo ".$con_emp, 0);

		$insr["id_tipo_documento"] 		= $tipo_doc["id"];
		$insr["tipo_documento"] 		= $tipo_doc["codigo"];
		$insr["year"] 					= $fecha[0];
		$insr["periodo"] 				= $fecha[1];
		$insr["detalle"] 				= $_POST['detalle'];
		$insr["obs"] 					= $_POST['obs'];
		$insr["fecha_documento"] 		= $_POST['fecha_documento'];
		$insr["valor"] 					= 0;
		$insr["dcto"] 					= 0;
		$insr["saldo"] 					= 0;
		$insr["cerrado"] 				= 0;
		$insr["creado_por"] 			= $_SESSION["idUsuario"];
		$insr["nombre_creador"] 		= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
		$insr["fecha_creacion"] 		= date("Y-m-d h:i:s");
		
		if($id == "") {

			$insr['creado_por'] 		 = utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
			$insr['id_usuario_creador']  = $_SESSION['idUsuario'];
			$insr['id_empresa'] 		 = $id_empresa;
			$insr['fecha_registro'] 	 = date("Y-m-d h:i:s");
			
			$insr["documento"] = $oGlobals->generarConsecutivoDe("AND codigo = '".$tipo_doc["codigo"]."' ".$con_emp,"-", 1);
			
			$insert = $oGlobals->insert_data_array($insr, "mov_cartera");
			
		}
		else { $insr['fecha_modificacion'] = date("Y-m-d h:i:s"); $update  = $oGlobals->update_data_array($insr, "mov_cartera", "id", $id); }

		$enlace = "detalle-cg_";

		if($tipo_doc["codigo"] == "NB") $enlace = "detalle-nb_";

		if($insert != 0)  	  echo "<div class='exito'>El documento se ha creado correctamente</div> <script>setTimeout('self.location=\"".$enlace."$insert.html\"', 2000)</script>";
		else if($update != 2) echo "<div class='exito'>Los cambios se guardaron correctamente</div>";
		else 				  echo "<div class='error'>No se puede guardar la categoría</div>";
	}
	else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";
	
	/* <div class="col-sm-4" id="gre<?php echo utf8_encode($categoria["id"]);?>"><div class="panel panel-warning panel-dark widget-profile"><div class="panel-heading"><div class="widget-profile-bg-icon"><i class="fa fa-trophy"></i></div><div class="widget-profile-header"><span><?php echo utf8_encode($categoria["categoria_competicion"]);?></span><br></div></div><div class="list-group"><a class="list-group-item"><i class="fa fa-user list-group-icon"></i>Entrenadores<span class="badge badge-info">0</span></a><a class="list-group-item"><i class="fa fa-users list-group-icon"></i>Jugadores<span class="badge badge-warning">0</span></a><a class="list-group-item"><i class="fa fa-gears list-group-icon"></i>Planes de trabajo<span class="badge badge-danger">0</span></a></div></div></div>*/

?>


             

    

