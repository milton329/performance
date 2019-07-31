<?php
session_start();
		
	if(trim($_POST["nombre"]) != "" && trim($_POST["id_rol"]) != ""){	
	

		require_once '../../class/classGlobal.php';

		$oGlobals = new Globals();	
		
		$id 			= $_POST['id'];
        $id_empresa 	= $_SESSION["id_empresa"];
		$tipo 			= $_POST['tipo'];
		$id_rol 		= $_POST['id_rol'];
		
		if  ($tipo=='CON') { $tipo_detalle='conocimientos'; }
        if  ($tipo=='HAB') { $tipo_detalle='habilidades'; }
        if  ($tipo=='ACT') { $tipo_detalle='actitudes'; }

        //consultar nombre del rol 
        $nombre_rol   = $oGlobals->verOpcionesPor("config_roles", " AND id = '$id_rol'", 0);
        $nombre_roles = $nombre_rol["rol"];


  //       if($id == "") {
		// //vericar valor del conocmientos que no supere los 100
  //       $sql2 = "SELECT sum(valor)as valor_maximo FROM competencias_1 where id_rol=$id_rol";
		// $competencias_2 	= $oGlobals->verPorConsultaPor($sql2, 0);
		// $valor_bd		    =$competencias_2["valor_maximo"];
		// $valor_posible      =100-$valor_bd;
  //       }
  //       else {
  //       //vericar valor del conocmientos que no supere los 100
  //       $sql2 = "SELECT sum(valor)as valor_maximo FROM competencias_1 where id_rol=$id_rol and id<>'$id'";
		// $competencias_2 	= $oGlobals->verPorConsultaPor($sql2, 0);
		// $valor_bd		    =$competencias_2["valor_maximo"];
		// $valor_posible      =100-$valor_bd;
  //       }   

  //       if ($valor<=$valor_posible){
 
		
		$insert = 0;
		$update = 2;

		if($id == "") 	{ 

			$_POST["rol"]					= $nombre_roles;
			$_POST["creado_por"]			= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
			$_POST["id_usuario_creador"]	= $_SESSION["idUsuario"];
			$_POST["id_empresa"]			= $id_empresa;
			$_POST["fecha_registro"]        = date("Y-m-d h:i:s"); 
			$_POST["fecha_modificacion"]    = date("Y-m-d h:i:s"); 

			$insert = $oGlobals->insert_data_array($_POST, "competencias_1"); 

			//editar todos los registros en el campo valor
			$sql1 = "update competencias_1 set valor='0' where rol='".$nombre_roles."' and  id_rol='".$id_rol."' and  tipo='".$tipo."'";
		    $update2 = $oGlobals->verPorConsultaPor($sql1, 0);
		    echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=../competencias/".$tipo_detalle.".html'>";  

		}
		else {

		    $_POST["rol"]    				=$nombre_roles;
			$_POST["fecha_modificacion"]    = date("Y-m-d h:i:s"); 

			$update = $oGlobals->update_data_array($_POST, "competencias_1", "id", $id);

            $sql1 = "update competencias_2 set rol='".$nombre_roles."', id_rol='".$id_rol."' where id_competencias_1='".$id."'";
		    $update2 = $oGlobals->verPorConsultaPor($sql1, 0);
		}
			
			if($insert != 0){
				echo "<div class='exito'>El registro se ha agregado correctamente</div>";
				$objetivo = $oGlobals->verOpcionesPor("competencias_1", " AND id = $insert", 0);
?>
				<script>
					html = '<tr id="tr_user_<?= $objetivo["id"];?>">\
			                  <td class="p-a-1"><?= $objetivo["tipo"];?></td>\
			                  <td class="p-a-1"><?= utf8_encode($objetivo["nombre"]);?></td>\
			                  <td class="p-a-1"><?= $objetivo["valor"];?> %</td>\
			                  <td class="p-a-1"><?= $objetivo["rol"];?></td>\
			                  <td class="p-a-1"><?= $objetivo["creado_por"];?></td>\
			                  <td class="p-a-1"><?= $objetivo["fecha_modificacion"];?></td>\
	                          <td align="center">\
	                          <a href="../competencias/menu_detalle-competencia_<?= $objetivo["id"];?>.html" target="_blank" class="btn btn-default btn-xs fa fa-eye" title="Ver"></a>\
	                          <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura(\'0_<?=$tipo;?>_<?= $objetivo["id"];?>\',\'competencias_1\', \'load_modulo\', 2);" title="Editar usuario" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>\
                              <a href="" onClick="Funciones.eliminar_registro(\'<?= $objetivo["id"];?>\', \'competencias_1\', \'rsp_elim\');" title="Editar módulo" data-toggle="modal" class="btn btn-default btn-xs fa fa-trash"></a>\
	                          </td>\
			              </tr>';
			        $("#tb_body").append(html);
			        $("#frm-crear-objetivo")[0].reset();

				</script>
<?php
			}
			else if($update != 2){

				echo "<div class='exito'>Los cambios se han guardado correctamente</div>";
				$objetivo = $oGlobals->verOpcionesPor("competencias_1", " AND id = '$id'", 0);
?>
				<script>
					
					html = 	 '<td class="p-a-1"><?= $objetivo["tipo"];?></td>\
			                  <td class="p-a-1"><?= utf8_encode($objetivo["nombre"]);?></td>\
			                  <td class="p-a-1"><?= $objetivo["valor"];?> %</td>\
			                  <td class="p-a-1"><?= $objetivo["rol"];?></td>\
			                  <td class="p-a-1"><?= $objetivo["creado_por"];?></td>\
			                  <td class="p-a-1"><?= $objetivo["fecha_modificacion"];?></td>\
	                          <td align="center">\
	                          <a href="../competencias/menu_detalle-competencia_<?= $objetivo["id"];?>.html" target="_blank" class="btn btn-default btn-xs fa fa-eye" title="Ver"></a>\
	                          <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura(\'0_<?=$tipo;?>_<?= $objetivo["id"];?>\',\'competencias_1\', \'load_modulo\', 2);" title="Editar usuario" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>\
                              <a href="" onClick="Funciones.eliminar_registro(\'<?= $objetivo["id"];?>\', \'competencias_1\', \'rsp_elim\');" title="Editar módulo" data-toggle="modal" class="btn btn-default btn-xs fa fa-trash"></a>\
	                          </td>';
			        $("#tr_user_<?= $id;?>").html(html);

				</script>
<?php				
			}
			else echo "<div class='error'>Ha ocurrido un error agregando el registro</div>";
           // } //fin de la condicion del valor posible

           // else
           // {
           //  echo "<div class='error'>Valor maximo posible es : ".$valor_posible." %</div>";
           // }				
	}
	else echo "<div class='error'>Debes ingresar compos obligatorios</div>";	

?>
