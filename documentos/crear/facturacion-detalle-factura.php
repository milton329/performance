<?php 
	

	if(isset($id) && is_numeric($id)){
	
		$documento = $oGlobals->verOpcionesPor("mov", " AND id = $id".$con_emp, 0);
		
		if($documento != 2){	
			
			$no_documento = $documento["documento"];

			$enlace = "";

			if($documento["tipo_documento"] == "REM") { $enlace = "finalizar_factura"; $action = "ver-factura_";}

			$empresa = $oGlobals->verOpcionesPor("empresas", " AND id = ".$documento["id_empresa"], 0);
?>

			<div class="page-header">
		        <div class="col-md-4 text-xs-center text-md-left text-nowrap">
		          <h1>
		          	<span class="text-muted font-weight-light"><i class="page-header-icon fa fa-money"></i>Administrativo/ Facturación /</span>
		            Documento <?= $documento["documento"];?>
		          </h1>
		        </div>
		    </div> 

		    <?php if($documento["cerrado"] == 0){?>
				    <a class="pull-right btn btn-primary" onClick="Funciones.cerrar_documento_nuevo('<?= $enlace;?>', '1', '<?= $documento["id"];?>', 'rsp-fin');" title="Finalizar factura" >
			      		<i class="fa fa-check"></i>&nbsp;&nbsp;Finalizar
			      	</a>
			      	<br style="clear: both;">
			      	<br style="clear: both;">
			      	<div id="rsp-fin"></div>
	      	<?php } else {?>
	      			<a href="../genera-pdf/<?= $action.$id;?>.html" target="_blank" class="pull-right btn btn-primary" title="Finalizar factura" >
			      		<i class="fa fa-print"></i>&nbsp;&nbsp;Imprimir
			      	</a>
			      	<br style="clear: both;">
			      	<br style="clear: both;">
			      	<div id="rsp-fin"></div>
	      	<?php }?>

		    <div class="panel">
		      <div class="panel-body p-a-4 b-b-4 bg-white ">
		        <div class="box m-a-0 border-radius-0 bg-white ">
		          <div class="box-row valign-middle">

		            <div class="box-cell col-md-8">
		              <div class="display-inline-block px-demo-brand px-demo-brand-lg valign-middle">
		                <span class="px-demo-logo m-y-0 m-r-2 bg-primary"><span class="px-demo-logo-1"></span><span class="px-demo-logo-2"></span><span class="px-demo-logo-3"></span><span class="px-demo-logo-4"></span><span class="px-demo-logo-5"></span><span class="px-demo-logo-6"></span><span class="px-demo-logo-7"></span><span class="px-demo-logo-8"></span><span class="px-demo-logo-9"></span></span>
		              </div>

		              <div class="display-inline-block m-r-3 valign-middle">
		                <div class="text-muted"><strong>Remisión</strong></div>
		                <div class="font-size-18 font-weight-bold line-height-1"><strong><?= utf8_encode($documento["documento"]);?></strong></div>
		              </div>

		              <!-- Spacer -->
		              <div class="m-t-3 visible-xs visible-sm"></div>

		              <div class="display-inline-block p-l-1 b-l-3 valign-middle font-size-12 text-muted">
		              	<div><?= utf8_encode($empresa["nombre_empresa"]);?> |  <?= utf8_encode($documento["tipo_documento"]);?> </div>
	

		              </div>

		            </div>

		            <!-- Spacer -->
		            <div class="m-t-3 visible-xs visible-sm"></div>

		            <div class="box-cell col-md-4">
		              <div class="pull-md-right font-size-15">
		                <div class="text-muted font-size-13 line-height-1"><strong>Fecha</strong></div>
		                <strong><?php if($documento["fecha_documento"] != "") echo $oGlobals->fecha($documento["fecha_documento"]);?></strong>
		              </div>
		              <div class="pull-md-right font-size-15" style="margin-right: 15px;">
		                <div class="text-muted font-size-13 line-height-1"><strong>Fecha vence</strong></div>
		                <strong><?php if($documento["fecha_vence"] != "") echo $oGlobals->fecha($documento["fecha_vence"]);?></strong>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>

		      <div class="panel-body p-a-4 bg-white b-b-2">
		        <div class="box m-a-0 border-radius-0">
		          <div class="box-row valign-middle">
		            <div class="box-cell col-md-6 font-size-14">
		              <div><strong><?= utf8_encode($documento["cliente_nombre"]);?></strong></div>
		              <div><?= utf8_encode($documento["cliente_identificacion"]);?></div>
		              <div><?= utf8_encode($documento["cliente_ciudad"]);?>, <?= utf8_encode($documento["cliente_direccion"]);?></div>
		              <div>Tel <?= utf8_encode($documento["cliente_telefono"]);?>, Celular <?= utf8_encode($documento["cliente_movil"]);?></div>
		            </div>

		            <!-- Spacer -->
		            <div class="m-t-3 visible-xs visible-sm"></div>

		            <div class="box-cell col-md-6 bg-white darken p-x-3 p-y-2">
		              <div class="pull-xs-left m-y-1 font-size-12 text-muted"><strong>TOTAL:</strong></div>
		              <div class="pull-xs-right font-size-24"><strong id="fact"></strong></div>
		            </div>
		          </div>
		        </div>
		      </div>

		      <div class="panel-body p-a-4" id="rsp-div-opc-asdf">
		      	<?php include $arbol.'../documentos/estructura/estructura-tab-documento-factura.php';;?>
		      </div>


		      <?php if($documento["cerrado"] == 0){?>

		      <a href="#load_modulo" class="pull-right btn btn-primary" onClick="Funciones.cargar_modal_estructura('0_<?= $id;?>', 'add_producto_a_factura', 'load_modulo', 2);" title="Agregar producto" data-toggle="modal"  style="margin-right: 10px;">
		      		<i class="fa fa-plus"></i>&nbsp;&nbsp;Agregar producto
		      </a>

		      <?php }?>

		      <br style="clear: both;">
		      <br style="clear: both;">
		      <br style="clear: both;">

    		</div>


    		<div class="modal fade" id="load_modulo" role="dialog"></div>

    		<?php
    			$abonos = 1;
    			
    			if(isset($abonos) && $abonos == 1){

    				$abonos = $oGlobals->verOpcionesPor("mov_r_cartera", "AND documento_cruce = '".$documento["documento"]."' AND credito > 0", 1);

    				if($abonos != 2){
    		?>
	    				<br />
	    				<div class="page-header">
					        <div class="col-md-4 text-xs-center text-md-left text-nowrap">
					          <h1>
					          	<span class="text-muted font-weight-light"><i class="page-header-icon fa fa-money"></i>Cartera / </span>
					            Pagos 
					          </h1>
					        </div>
					    </div> 

	    				<div class="table-responsive">
						    <table class="table m-a-0 table-striped ">
						      <thead>
						        <tr class="bg-white darken">
						          <th class="p-x-2">Fecha</th>
						          <th class="p-x-2">Documento</th>
						          <th class="p-x-2" width="35%">Movimiento</th>
						          <th class="p-x-2">Valor</th>
						        </tr>
						      </thead>
						      <tbody id="tr_body_ref_fac" class="font-size-14">

						        <?php 
						            
						            if($abonos != 2){
						              
						              $linea      = 0;
						              $t_subtotal = 0;

						              foreach ($abonos as $abono) {

						                $t_subtotal += $abono["credito"];
						        ?>
						                <tr id="trttrr_<?= $producto["id"];?>">
						                  <td class="p-a-1" align="center"><?= $oGlobals->fecha($abono["fecha_registro"]);?></td>
						                  <td class="p-a-1" align="center"><?= utf8_encode($abono["documento"]);?></td>
						                  <td class="p-a-1" align="center"><div class="font-weight-semibold"><?= utf8_encode($abono["tipo_movimiento"]);?></div></td>
						                  <td class="p-a-1" align="right"><?= number_format($abono["credito"], 0, "", ".");?></td>
						              	</tr>
						        <?php 
						                $linea++;
						              }
						        ?>
							            <tr>
							                <td class="p-a-1" align="center"><strong><?= $linea;?></strong></td>
							                <td class="p-a-1" align="center"></td>
							                <td class="p-a-1" align="center"></td>
							                <td class="p-a-1" align="right"><strong><?= number_format($t_subtotal, 0, "", ".");?></strong></td>
							 
							            </tr>

						          </tbody>
						        <?php
						            }
						        ?>
						      
						    </table>
						</div>
    		<?php	
    				}	
    			}
    		?>

<?php 
		}
	}
?>
