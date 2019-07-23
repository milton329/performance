<?php
session_start();
		
	if(trim($_POST["nombre"]) != "" && trim($_POST["valor"]) != ""){	
	

		require_once '../../class/classGlobal.php';

		$oGlobals = new Globals();	  
	
		$id 				= $_POST['id'];
        $id_empresa 		= $_SESSION["id_empresa"];
		$tipo 				= $_POST['tipo'];
		$id_competencias_1  = $_POST['id_competencias_1'];
		$valor              = $_POST['valor'];        
		
        if($id == "") {
		//vericar valor del conocmientos que no supere los 100
        $sql2 = "SELECT sum(valor)as valor_maximo FROM competencias_2 where id_competencias_1=$id_competencias_1";
		$competencias_2 	= $oGlobals->verPorConsultaPor($sql2, 0);
		$valor_bd		    =$competencias_2["valor_maximo"];
		$valor_posible      =100-$valor_bd;
        }
        else {
        //vericar valor del conocmientos que no supere los 100
        $sql2 = "SELECT sum(valor)as valor_maximo FROM competencias_2 where id_competencias_1=$id_competencias_1 and id<>'$id'";
		$competencias_2 	= $oGlobals->verPorConsultaPor($sql2, 0);
		$valor_bd		    =$competencias_2["valor_maximo"];
		$valor_posible      =100-$valor_bd;
        }   

		if ($valor<=$valor_posible){

		$sql1 = "SELECT * FROM competencias_1 where id=$id_competencias_1";
		$competencias_1 = $oGlobals->verPorConsultaPor($sql1, 0);
		$id_rol		    =$competencias_1["id_rol"];
		$nombre_roles 	=$competencias_1["rol"];
 
		
		$insert = 0;
		$update = 2;

		if($id == "") 	{ 

			$_POST["id_rol"]				= $id_rol;
			$_POST["rol"]					= $nombre_roles;
			$_POST["creado_por"]			= utf8_encode($_SESSION["nombre"]." ".$_SESSION["apellido"]);
			$_POST["id_usuario_creador"]	= $_SESSION["idUsuario"];
			$_POST["id_empresa"]			= $id_empresa;
			$_POST["fecha_registro"]        = date("Y-m-d h:i:s"); 
			$_POST["fecha_modificacion"]    = date("Y-m-d h:i:s"); 

			$insert = $oGlobals->insert_data_array($_POST, "competencias_2"); 
		}
		else {
		
			$_POST["fecha_modificacion"]    = date("Y-m-d h:i:s"); 

			$update = $oGlobals->update_data_array($_POST, "competencias_2", "id", $id);

		}
			
			if($insert != 0){
				echo "<div class='exito'>El registro se ha agregado correctamente</div>";
				$objetivo = $oGlobals->verOpcionesPor("competencias_2", " AND id = $insert", 0);
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
	                          <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura(\'0_<?=$tipo;?>_<?= $objetivo["id"];?>_<?= $objetivo["id_competencias_1"];?>\',\'competencias_2\', \'load_modulo\', 2);" title="Editar usuario" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>\
                              <a href="" onClick="Funciones.eliminar_registro(\'<?= $objetivo["id"];?>\', \'competencias_2\', \'rsp_elim\');" title="Editar módulo" data-toggle="modal" class="btn btn-default btn-xs fa fa-trash"></a>\
	                          </td>\
			              </tr>';
			        $("#tb_body").append(html);
			        $("#frm-crear-objetivo")[0].reset();

				</script>
<?php
			}
			else if($update != 2){

				echo "<div class='exito'>Los cambios se han guardado correctamente</div>";
				$objetivo = $oGlobals->verOpcionesPor("competencias_2", " AND id = '$id'", 0);
?>
				<script>
					
					html = 	 '<td class="p-a-1"><?= $objetivo["tipo"];?></td>\
			                  <td class="p-a-1"><?= utf8_encode($objetivo["nombre"]);?></td>\
			                  <td class="p-a-1"><?= $objetivo["valor"];?> %</td>\
			                  <td class="p-a-1"><?= $objetivo["rol"];?></td>\
			                  <td class="p-a-1"><?= $objetivo["creado_por"];?></td>\
			                  <td class="p-a-1"><?= $objetivo["fecha_modificacion"];?></td>\
	                          <td align="center">\
	                          <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura(\'0_<?=$tipo;?>_<?= $objetivo["id"];?>_<?= $objetivo["id_competencias_1"];?>\',\'competencias_2\', \'load_modulo\', 2);" title="Editar usuario" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>\
                              <a href="" onClick="Funciones.eliminar_registro(\'<?= $objetivo["id"];?>\', \'competencias_2\', \'rsp_elim\');" title="Editar módulo" data-toggle="modal" class="btn btn-default btn-xs fa fa-trash"></a>\
	                          </td>';
			        $("#tr_user_<?= $id;?>").html(html);

				</script>
<?php				
			}
			else echo "<div class='error'>Ha ocurrido un error agregando el registro</div>";
           } //fin de la condicion del valor posible

           else
           {
            echo "<div class='error'>Valor maximo posible es : ".$valor_posible." %</div>";
           }				
	}
	else echo "<div class='error'>Debes ingresar compos obligatorios</div>";	

?>
