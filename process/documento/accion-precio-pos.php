<?php
session_start();

if(trim($_POST['por_dcto'])!= ""){


	if(trim($_POST['valor_unitario']) != "" && trim($_POST['cantidad_pedida']) != ""){
							
		
		require_once '../../class/classGlobal.php';

		$oGlobals = new Globals();	
		
		$id = $oGlobals->iFilter->process($_POST['id']);
		
		$insert = 0;
		$update = 2;

		$reg = $oGlobals->verOpcionesPor("mov_r_pedidos", " AND id = $id", 0);
            
            
			$sub_pedido                  = $_POST["cantidad_pedida"] * $_POST['valor_unitario'];
			$dcto                        = ($_POST['por_dcto'] * $sub_pedido) / 100 ; 
			$sub_pedido_neto             = $sub_pedido-$dcto;
			$_POST["dcto"]	             = $dcto;
			$_POST["sub_pedido"]         = $sub_pedido_neto;
			$_POST["fecha_modificacion"] = date("Y-m-d h:i:s"); 
			


			$update = $oGlobals->update_data_array($_POST, "mov_r_pedidos", "id", $id);

			if($update != 2) {
				
				echo "<div class='exito'>Guardado correctamente</div>";  

				$sql   = "SELECT SUM(sub_pedido) AS total FROM mov_r_pedidos WHERE documento = '".$reg["documento"]."'";
				$total = $oGlobals->verPorConsultaPor($sql, 0);

				echo "<script>$('#total_pos').text('".number_format($total["total"], 0, "", ".")."');</script>";
?>
				<script>
					$('#valor_<?= $id;?>').text("<?= number_format($_POST['valor_unitario'], 0, "", ".");?>");
					$('#sub_total_<?= $id;?>').text("<?= number_format($sub_pedido_neto, 0, "", ".");?>");
					$('#cantidad_<?= $id;?>').text("<?= ($_POST['cantidad_pedida']);?>");
				</script>
<?php			
			} 	
	} 
	else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";


}
else

{			
	if(trim($_POST['valor_unitario']) != "" && trim($_POST['cantidad_pedida']) != ""){
							
		
		require_once '../../class/classGlobal.php';

		$oGlobals = new Globals();	
		
		$id = $oGlobals->iFilter->process($_POST['id']);
		
		$insert = 0;
		$update = 2;

		$reg = $oGlobals->verOpcionesPor("mov_r_pedidos", " AND id = $id", 0);


		    $sub_pedido                  = $_POST["cantidad_pedida"] * $_POST['valor_unitario'];
			$dcto                        = $_POST['dcto']; 
            $sub_pedido_neto             = $sub_pedido-$dcto;
			$_POST["dcto"]	             = $dcto;
			$_POST["sub_pedido"]         = $sub_pedido_neto;
			$_POST["fecha_modificacion"] = date("Y-m-d h:i:s"); 


			$update = $oGlobals->update_data_array($_POST, "mov_r_pedidos", "id", $id);

			if($update != 2) {
				
				echo "<div class='exito'>Guardado correctamente</div>";  

				$sql   = "SELECT SUM(sub_pedido) AS total FROM mov_r_pedidos WHERE documento = '".$reg["documento"]."'";
				$total = $oGlobals->verPorConsultaPor($sql, 0);

				echo "<script>$('#total_pos').text('".number_format($total["total"], 0, "", ".")."');</script>";
?>
				<script>
					$('#valor_<?= $id;?>').text("<?= number_format($_POST['valor_unitario'], 0, "", ".");?>");
					$('#sub_total_<?= $id;?>').text("<?= number_format($sub_pedido_neto, 0, "", ".");?>");
					$('#cantidad_<?= $id;?>').text("<?= ($_POST['cantidad_pedida']);?>");
				</script>
<?php			
			} 	
	} 
	else echo "<div class='error'>Debes ingresar los campos obligatorios</div>";
}
?>




