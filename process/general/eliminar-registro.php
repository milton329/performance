<?php
session_start();
		
		if($_POST['id'] != "" && $_POST['table'] != ""){
								

			require_once '../../class/classGlobal.php';
			
			$oGlobals = new Globals();	
			
			$id    = $oGlobals->iFilter->process($_POST['id']);
			$table = $oGlobals->iFilter->process($_POST['table']);

			if(isset($_POST['fadeOut'])) $tr = $oGlobals->iFilter->process($_POST['fadeOut']);
			
			
			if($table == "eliminar_documento"){

				$documento = $oGlobals->verOpcionesPor("mov", " AND id = $id", 0);

				if($documento != 2){

					$tipo = $documento["tipo_documento"];

					//if($tipo == "REM"){

						$delete = $oGlobals->eliminar_por("mov", "id", $id);
						$delete = $oGlobals->eliminar_por("mov_r", "documento", $documento["documento"]);
						$delete = $oGlobals->eliminar_por("mov_cartera", "documento", $documento["documento"]);
						$delete = $oGlobals->eliminar_por("mov_r_cartera", "documento_cruce", $documento["documento"]);
						
					/*}
					else if($tipo == "COT"){

					} */

					echo "<script>$('#".$tr."".$id."').fadeOut();</script>";

				}

			}	


			if($table == "eliminar_documento_cartera"){

				$documento = $oGlobals->verOpcionesPor("mov_cartera", " AND id = $id", 0);

				if($documento != 2){

					$delete = $oGlobals->eliminar_por("mov_cartera", "id", $documento["id"]);
					$delete = $oGlobals->eliminar_por("mov_r_cartera", "documento", $documento["documento"]);
					echo "<script>$('#".$tr."".$id."').fadeOut();</script>";

				}

			}

			if($table == "eliminar_registro_traslado"){


				$reg = $oGlobals->verOpcionesPor("mov_r", " AND id = $id", 0);

				if($reg != 2){

					$delete = $oGlobals->eliminar_por_condicion("mov_r", "codigo", $reg["codigo"], " AND documento = '".$reg["documento"]."'");
					echo "<script>$('#".$tr."".$id."').fadeOut();</script>";

				}


			}

			if($table == "eliminar_registro_pos"){

				$reg = $oGlobals->verOpcionesPor("mov_r_pedidos", " AND id = $id", 0);

				if($reg != 2){

					$delete = $oGlobals->eliminar_por_condicion("mov_r_pedidos", "id", $reg["id"], " AND id_empresa = '".$_SESSION["id_empresa"]."'");

					$sql   = "SELECT SUM(sub_pedido) AS total FROM mov_r_pedidos WHERE documento = '".$reg["documento"]."'";
					$total = $oGlobals->verPorConsultaPor($sql, 0);
					echo "<script>$('#".$tr."".$id."').slideUp();</script>";
					echo "<script>$('#total_pos').text('".number_format($total["total"], 0, "", ".")."');</script>";
				
				}

			}

			else {

				$eliminar = $oGlobals->eliminar_por($table, "id", $id);
			
				if($eliminar != 2){

					if($table == "informes_campos")  		$tr = "tr_cam_";
					if($table == "informes_titulos") 		$tr = "tr_titu_";
					if($table == "config_modulos_opciones") $tr = "tr_opc_";
					if($table == "config_usuarios")         $tr = "tr_user_";
					if($table == "objetivos")         		$tr = "tr_user_";
					if($table == "competencias_1")         	$tr = "tr_user_";
					if($table == "competencias_2")         	$tr = "tr_user_";
					if($table == "puntuaciones")         	$tr = "tr_user_";

					echo "<script>$('#".$tr."".$id."').fadeOut();</script>";
				}	
			}
				
		} 


		//Codigo Añadido por Brandon el dia 28/04/2019 Funcion para activar el Boton de borrar todo en el POS
		if($table == "eliminar_todo_pos"){

			$reg = $oGlobals->verOpcionesPor("mov_r_pedidos", " AND documento = '$id' ", 0);

			if($reg != 2){

				$delete = $oGlobals->eliminar_por_condicion("mov_r_pedidos", "documento", $reg["documento"], " AND id_empresa = '".$_SESSION["id_empresa"]."'");

				$sql   = "SELECT SUM(sub_pedido) AS total FROM mov_r_pedidos WHERE documento = '".$reg["documento"]."'";
				$total = $oGlobals->verPorConsultaPor($sql, 0);
				echo "<script>$('.deleteposall').slideUp();</script>";
				echo "<script>$('#total_pos').text('".number_format($total["total"], 0, "", ".")."');</script>";
				
			
			}

		}
		

		if($table == "eliminar_todo"){

				$delete = $oGlobals->eliminar_todo("mov_r_pedidos");

				$sql   = "SELECT SUM(sub_pedido) AS total FROM mov_r_pedidos WHERE documento = '".$reg["documento"]."'";
				$total = $oGlobals->verPorConsultaPor($sql, 0);
				echo "<script>$('#".$tr."".$id."').slideUp();</script>";
				echo "<script>$('#total_pos').text('".number_format($total["total"], 0, "", ".")."');</script>";

		}		

?>
