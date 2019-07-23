<?php 
	

	if(isset($id) && is_numeric($id)){
	
		$documento = $oGlobals->verOpcionesPor("mov", " AND id = $id".$con_emp, 0);
		
		if($documento != 2){	
			
			$no_documento = $documento["documento"];

			$enlace = "finalizar_devolucion";

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
				    <a class="pull-right btn btn-danger" onClick="Funciones.cerrar_documento_nuevo('<?= $enlace;?>', '1', '<?= $documento["id"];?>', 'rsp-fin');" title="Finalizar factura" >
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
		                <span class="px-demo-logo m-y-0 m-r-2 bg-danger"><span class="px-demo-logo-1"></span><span class="px-demo-logo-2"></span><span class="px-demo-logo-3"></span><span class="px-demo-logo-4"></span><span class="px-demo-logo-5"></span><span class="px-demo-logo-6"></span><span class="px-demo-logo-7"></span><span class="px-demo-logo-8"></span><span class="px-demo-logo-9"></span></span>
		              </div>

		              <div class="display-inline-block m-r-3 valign-middle">
		                <div class="text-muted"><strong>Devolución</strong></div>
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
		      	<?php include $arbol.'../documentos/estructura/estructura-tab-documento-entrada.php';;?>
		      </div>


		      <?php if($documento["cerrado"] == 0){?>

		      <a href="#load_modulo" class="pull-right btn btn-danger" onClick="Funciones.cargar_modal_estructura('0_<?= $id;?>', 'add_producto_a_devolucion', 'load_modulo', 2);" title="Agregar producto" data-toggle="modal"  style="margin-right: 10px;">
		      		<i class="fa fa-plus"></i>&nbsp;&nbsp;Agregar producto
		      </a>

		      <?php }?>

		      <br style="clear: both;">
		      <br style="clear: both;">
		      <br style="clear: both;">

    		</div>


    		<div class="modal fade" id="load_modulo" role="dialog"></div>
<?php 
		}
	}
?>
