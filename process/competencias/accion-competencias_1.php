<?php
session_start();
		
	if(trim($_POST["nombre"]) != ""){	
	

		require_once '../../class/classGlobal.php';

		$oGlobals = new Globals();	
		
		$id 			= $_POST['id'];
        $id_empresa 	= $_SESSION["id_empresa"];
		$tipo 			= $_POST['tipo'];
		$rol 		    = $_POST['rol'];

		//consultar id_rol
        $sql 		= "SELECT id FROM config_roles where rol='".$rol."'";	
		$sql1 		= $oGlobals->verPorConsultaPor($sql, 0);
		$id_rol 	= $sql1[0];
		
		if  ($tipo=='CON') { $tipo_detalle='conocimientos'; }
        if  ($tipo=='HAB') { $tipo_detalle='habilidades'; }
        if  ($tipo=='ACT') { $tipo_detalle='actitudes'; }
		
		$insert = 0;
		$update = 2;

		if($id == "") 	{ 

			$_POST["id_rol"]                = $id_rol;
			$_POST["creado_por"]			= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
			$_POST["id_usuario_creador"]	= $_SESSION["idUsuario"];
			$_POST["id_empresa"]			= $id_empresa;
			$_POST["fecha_registro"]        = date("Y-m-d h:i:s"); 
			$_POST["fecha_modificacion"]    = date("Y-m-d h:i:s"); 

			$insert = $oGlobals->insert_data_array($_POST, "competencias_1"); 

			//editar todos los registros en el campo valor
			$sql1 = "update competencias_1 set valor='0' where rol='".$rol."' and  id_rol='".$id_rol."' and  tipo='".$tipo."'";
		    $update2 = $oGlobals->verPorConsultaPor($sql1, 0);
		    // echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=../competencias/".$tipo_detalle.".html'>";  

		}
		else {

			$_POST["id_rol"]                = $id_rol;
			$_POST["fecha_modificacion"]    = date("Y-m-d h:i:s"); 
			$update = $oGlobals->update_data_array($_POST, "competencias_1", "id", $id);
            $sql1 = "update competencias_2 set rol='".$rol."', id_rol='".$id_rol."' where id_competencias_1='".$id."'";
		    $update2 = $oGlobals->verPorConsultaPor($sql1, 0);
		}
			
			if($insert != 0){
				// echo "<div class='exito'>El registro se ha agregado correctamente</div>";
				$sql = "SELECT * FROM competencias_1 where tipo='".$tipo."' and rol='".$rol."'";      
                $objetivos = $oGlobals->verPorConsultaPor($sql, 1);
?>
            <script>
					
			html = 	 '<?php $num=1;foreach($objetivos as $objetivo){
            $idd="id".$num;
            $puntuacion="puntuacion".$num;
            ?>
            <input type="hidden" name="id_rol" id="id_rol" value="<?=$objetivo["id_rol"];?>">\
            <input type="hidden" name="tipo" id="tipo" value="<?=$objetivo["tipo"];?>">\
            <input type="hidden" name="<?=$idd;?>" id="<?=$idd;?>" value="<?=$objetivo["id"];?>">\
                    <tr id="tr_user_<?= $objetivo["id"];?>">\
                        <td><?= utf8_encode($objetivo["tipo"]);?></td>\
                        <td><?= utf8_encode($objetivo["nombre"]);?></td>\
                        <td><input class="form-control form-group-margin" type="text" id="<?=$puntuacion;?>" name="<?=$puntuacion;?>" value="<?= utf8_encode($objetivo["valor"]);?>"/></td>\
                        <td><?= utf8_encode($objetivo["rol"]);?></td>\
                        <td><?= utf8_encode($objetivo["creado_por"]);?></td>\
                        <td><?= utf8_encode($objetivo["fecha_modificacion"]);?></td>\
                        <td align="center" style="width:13%;">\
                            <a href="../competencias/menu_detalle-competencia_<?= $objetivo["id"];?>.html" target="_blank" class="btn btn-default btn-xs fa fa-eye" title="Ver"></a>\
							<a href="#load_modulo" onClick="Funciones.cargar_modal_estructura(\'0_<?=$tipo;?>_<?= $objetivo["id"];?>_<?= $objetivo["rol"];?>\', \'competencias_1\', \'load_modulo\', 2);" title="Editar" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>\
                            <a href="" onClick="Funciones.eliminar_registro(\'<?= $objetivo["id"];?>\', \'competencias_1\', \'rsp_elim\');" title="Eliminar" data-toggle="modal" class="btn btn-default btn-xs fa fa-trash"></a>\
                        </td>\
                    </tr>\
            <?php $num=$num+1;} ?>';

			$("#tb_body").html(html);

				</script>

<?php
			}
			else if($update != 2){

				// echo "<div class='exito'>Los cambios se han guardado correctamente</div>";
				$sql = "SELECT * FROM competencias_1 where tipo='".$tipo."' and rol='".$rol."'";      
                $objetivos = $oGlobals->verPorConsultaPor($sql, 1);
?>
            <script>
					
			html = 	 '<?php $num=1;foreach($objetivos as $objetivo){
            $idd="id".$num;
            $puntuacion="puntuacion".$num;
            ?>
            <input type="hidden" name="id_rol" id="id_rol" value="<?=$objetivo["id_rol"];?>">\
            <input type="hidden" name="tipo" id="tipo" value="<?=$objetivo["tipo"];?>">\
            <input type="hidden" name="<?=$idd;?>" id="<?=$idd;?>" value="<?=$objetivo["id"];?>">\
                    <tr id="tr_user_<?= $objetivo["id"];?>">\
                        <td><?= utf8_encode($objetivo["tipo"]);?></td>\
                        <td><?= utf8_encode($objetivo["nombre"]);?></td>\
                        <td><input class="form-control form-group-margin" type="text" id="<?=$puntuacion;?>" name="<?=$puntuacion;?>" value="<?= utf8_encode($objetivo["valor"]);?>"/></td>\
                        <td><?= utf8_encode($objetivo["rol"]);?></td>\
                        <td><?= utf8_encode($objetivo["creado_por"]);?></td>\
                        <td><?= utf8_encode($objetivo["fecha_modificacion"]);?></td>\
                        <td align="center" style="width:13%;">\
                            <a href="../competencias/menu_detalle-competencia_<?= $objetivo["id"];?>.html" target="_blank" class="btn btn-default btn-xs fa fa-eye" title="Ver"></a>\
							<a href="#load_modulo" onClick="Funciones.cargar_modal_estructura(\'0_<?=$tipo;?>_<?= $objetivo["id"];?>_<?= $objetivo["rol"];?>\', \'competencias_1\', \'load_modulo\', 2);" title="Editar" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>\
                            <a href="" onClick="Funciones.eliminar_registro(\'<?= $objetivo["id"];?>\', \'competencias_1\', \'rsp_elim\');" title="Eliminar" data-toggle="modal" class="btn btn-default btn-xs fa fa-trash"></a>\
                        </td>\
                    </tr>\
            <?php $num=$num+1;} ?>';

			$("#tb_body").html(html);

				</script>
<?php				
			}
			else echo "<div class='error'>Ha ocurrido un error agregando el registro</div>";		
	}
	else echo "<div class='error'>Debes ingresar compos obligatorios</div>";	

?>
