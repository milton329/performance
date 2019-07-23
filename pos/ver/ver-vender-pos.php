<link rel="stylesheet" type="text/css" href="../cods/css/fixion.css?v=1003">
<script type="text/javascript" src="../estructura/estructura-pos-pagar.php"></script>
<script src="../cods/js/control/jquerion.js?v=1003">
 window.onload = function(){ 
                  window.location = $('#load_modulo_cliente').attr('href');
 }
</script>

<script>
$(document).ready(function(){
	$("#txt_producto").focus();
})
	
</script>
<?php
                  //verificar si el usuario tiene un cuadre abierto en el sistema
                  $apertura="SELECT * FROM pos_cuadre
			        where cajero='".$_SESSION["usuario"]."' and cerrado='0'";
			      $dato_apertura = $oGlobals->verPorConsultaPor($apertura, 0);
			        
			      $id=$dato_apertura['id'];

			      if($id== ""){
			      //hay un cuadre pendiente
			      //include 'tablas/tb-apertura-dark.php';

 ?>

    <!-- Modal -->
    <div class="modal fade" id="modalInicio" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
       <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Realizar Apertura</h4>
         </div>
         <div class="modal-body">

         <?php
                    $usuarios="SELECT * FROM config_usuarios
                    where usuario='".$_SESSION["usuario"]."'";
                    $usuario = $oGlobals->verPorConsultaPor($usuarios, 0);
                    
                   $identificacion=$usuario['identificacion'];
                   $nombre=$usuario['nombre']." ".$usuario['apellido'];
                   $cajero=$usuario['usuario'];  

         include 'estructura/estructura-ml-apertura.php';
         ?>  
         </div>
        </div>
      </div>
    </div>
  </div>
  <script>
  $(document).ready(function()  {
    // id de nuestro modal
    $("#modalInicio").modal("show");
  });
  </script>
<?php	
}
?>

<!-- ESTE ARCHIVO FUE EDITADO POR BRANDON EL 28/04/2019 QUITANDO EL HEADER Y AÑADIENDOLO EN SU LUGAR SEGUN DISEÑO -->

<div class="row m0" style="margin:-20px -20px -20px;">
	
	<div class="col-sm-8 col-xs-12 p0">

		<form method="post" class="form_sdv" action="../process/inventario/consultar-referencia.php" id="frm-consulta-referencia">
				
				<input type="hidden" name="vari" id="vari" value="2">

			<div class="w100 h50 bccc" style="z-index: 11;">
				<div class="tabAll">
					<div class="tabIn bAzulKword bHoverV cP" style="width:120px;">
						<div class="colorfff p15 t20 taC">
							<i class="fa fa-plus-square"></i>&nbsp;
							<small class="t12">Nuevo</small>
						</div>
					</div>
					<div class="tabIn pLR10"><!-- onkeyup="Funciones.cargar_referencia('var', 'rsp-frm-consulta-referencia');"-->
						<input id="txt_producto" name="ref" type="text" class="bS1 rr5 bfff w100 p510" placeholder="Ingrese un criterio de búsqueda" >
					</div>
					<div class="tabIn bAzulKword bHoverV cP" style="width:50px;">
						<div class="colorfff p15 t20 taC">
							<i class="fa fa-search"></i>
						</div>
					</div>
					<div class="tabIn b666 bHoverV2 cP" style="width:50px;">
						<div class="colorfff p15 t20 taC">
							<i class="fa fa-barcode"></i>
						</div>
					</div>
				</div>
			</div>

		</form>

 <!-- ESTE ARCHIVO FUE EDITADO POR BRANDON EL 28/04/2019 AÑADIENDO LA ESTRUCTURA NUEVA DE LA CARGA DE PRODUCTOS -->

		<div class="camProds posR" style="overflow:auto;">

			<div class="p30 bfff">
								
				<div class="row" id="rsp-frm-consulta-referencia">
				<p style="font-size: 18px; text-align:center; font-weight:600; color:#00A9F1;">BUSQUEDA PRODUCTOS / COD BARRAS</p>
					<?php
					include ("../inventarios/estructura/estructura-tab-referencia-pos-defecto.php");?>
				</div>
				
			</div>
			
		</div>


		<div class="camProds posR" style="overflow:auto;">

<div class="p30 bfff">
					
	<div class="row" id="rsp-frm-consulta-referencia">
		<p style="font-size: 18px; text-align:center; font-weight:600; color:#00A9F1;">PRODUCTOS MAS VENDIDOS</p>
		<?php
		include ("../inventarios/estructura/estructura-tab-referencia-pos-mas-vendidos.php");?>
	</div>
	
</div>

</div>

 <!-- HASTA AQUI ESTE ARCHIVO FUE EDITADO POR BRANDON EL 28/04/2019 AÑADIENDO LA ESTRUCTURA NUEVA DE LA CARGA DE PRODUCTOS -->


		
	</div>
	<div class="col-sm-4 col-xs-12 p0">
		
		<div class="w100 h50 bAzulKword2 darker" style="z-index: 11;">
			<div class="tabAll">
				<div class="tabIn taC colorfff t24 ff0">
					VENTAS
				</div>
			</div>
		</div>
		<div class="w100 h50 beee" style="z-index: 11;">
			<div class="tabAll">				
				<div class="tabIn bHoverV cP" style="width:50px;">
					<div class="color666 p15 t20 taC">
						<i class="fa fa-users"></i>
					</div>
				</div>


				<div class="tabIn" style="padding-right:10px;">
                <form class="form_sdv" action="../process/documento/accion-cliente-factura-pos.php" method="post" id="frm-cliente-factura-pos">
					<input type="text" class="bS1 rr5 bfff w100 p510" placeholder="Clientes" id="text_cliente" name="text_cliente"/>
                <button type="submit" class="btn btn-primary" style="visibility:hidden;"></button>
				</div>


				
				<div class="tabIn bAzulKword bHoverV cP" style="width:120px;">
					<div class="colorfff p15 t20 taC">
						<a href="#load_modulo_cliente" onclick="Funciones.cargar_modal_estructura('0', 'nuevo_cliente', 'load_modulo_cliente', 2);" data-toggle="modal" style="color: #fff" >
						<i class="fa fa-plus-square"></i>&nbsp;
						<small class="t12">
						Nuevo
					    </small>
					   </a>
					</div>
				</div>
			</div>
		</div>
	
		<div class="camVenta bfff" style="overflow:auto;">

			<div id="rsp-frm-cliente-factura-pos">
				<?php include ("tablas/tb-cliente-factura-pos.php");?>
			</div>

			
			<div class="" id="tb_divi">

				<div id="rspdasds"></div>

				 <?php 
						 $total 		= 0;

						 //unset($_SESSION["ped_pos"]);

				 		if(isset($_SESSION['ped_pos'])){
						
							$ped_pos      = $_SESSION['ped_pos'];
							$sub_total  = 0;
							$t_cantidad = 0;
							
							$detalles = $oGlobals->verOpcionesPor("mov_r_pedidos", " AND documento = '$ped_pos'", 1);
							
							if($detalles != 2){

					 			foreach ($detalles as $producto) {

						 			$sub_total = $producto["valor_unitario"] * $producto["cantidad_pedida"];
						 			$total    += $sub_total;
				?>
									<div class="tab bBS1 p10 deleteposall" id="tr_car_<?= $producto["id"]?>">
										<div class="tabIn" style="width:50px;">
											<img src="../static-pictures/products/200x200/foto.jpg" class="rr50 bS1" alt="">
										</div>
										<div class="tabIn pLR10">
											<div class="ff3 t16 color333"><a href="#load_talla" onclick="Funciones.cargar_modal_estructura('<?= $producto['id'];?>', 'cambiar_precio_venta_pos', 'load_talla', 2);" data-toggle="modal"><?= utf8_encode($producto["detalle"]);?></a></div>
											<div class="color666">
												<span id="valor_<?= $producto["id"];?>"><?= number_format($producto["valor_unitario"], 0, "", ".");?></span> | 
												<span class="colorVerde"><?= utf8_encode($producto["referencia"]);?></span> |
												<span class="colorVerde"><?= utf8_encode($producto["codigo"]);?></span>
											</div>
										</div>
										<div class="tabIn taC ff3 colorVerde2" style="width:50px;" id="cantidad_<?= $producto['id']?>"><?= number_format($producto["cantidad_pedida"], 0, "", ".");?></div>
										<div class="tabIn taR ff2 color666 t16" style="width:80px;">$<span id="sub_total_<?= $producto['id']?>"><?= number_format($sub_total, 0, "", ".");?></span></div>
										<div class="tabIn taR" style="width: 35px;">
											<i onclick="Funciones.eliminar_registro('<?= $producto["id"];?>', 'eliminar_registro_pos', 'rspdasds', 'tr_car_');" class="rr50 t12 colorfff bDelete fa fa-trash cP" style="padding: 5px 6px;"></i>
										</div>
									</div>
				<?php 
								}	
							} 
						}
				?>
			</div>
		</div>
	
		<div class="w100 h50" style="z-index: 11;">
			<div class="tabAll" onclick="">
				<div id="xd" class="tabIn pLR20 bAzulKword2 bHoverV2 t24 colorfff ff0 cP" href="#load_talla" onclick="Funciones.cargar_modal_estructura('0', 'cerrar_pedido_pos', 'load_talla', 2);" data-toggle="modal">
					<a class="colorfff" >
					<span id="total_pos" class="ff2 fR"><?= number_format($total, 0, "", ".");?> </span><span class="ff2 fR">$</span>
					Pagar
					</a>
				</div>
				<?php ///Codigo Añadido por Brandon el dia 28/04/2019 Borrar todo ?>
					
						<div class="tabIn bDelete cP" style="width:50px;" onclick="Funciones.eliminar_registro('<?= $_SESSION["ped_pos"]?>', 'eliminar_todo_pos', 'rspdasds', '');">
							<div class="colorfff p15 t20 taC">
								<i class="fa fa-trash-o"></i>
							</div>
						</div>
			</div>
		</div>
		
	</div>
	
</div>

    
<div id="load_talla" class="modal fade" role="dialog" ></div> 
 <div class="modal fade" id="load_modulo_cliente" role="dialog"></div>
 

