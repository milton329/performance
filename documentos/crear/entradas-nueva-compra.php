	<div class="page-header">
        <div class="col-md-4 text-xs-center text-md-left text-nowrap">
          <h1>
          	<span class="text-muted font-weight-light"><i class="page-header-icon fa fa-cubes"></i>Documentos / Entradas /</span>
            Nueva compra
          </h1>
        </div>
    </div> 

    <a href="#load_modulo_proveedor" onclick="Funciones.cargar_modal_estructura('0', 'nuevo_proveedor', 'load_modulo_proveedor', 2);" class="btn btn-xs btn-primary btn-outline" data-toggle="modal" style="float: right; margin-left: 5px; margin-bottom: 8px;">
      <span class="btn-label-icon left fa fa-plus"></span>Nuevo proveedor
    </a>

    <a href="#load_modulo_bodega" onclick="Funciones.cargar_modal_estructura('0', 'nuevo_bodega', 'load_modulo_bodega', 2);" class="btn btn-xs btn-primary btn-outline" data-toggle="modal" style="float: right; margin-bottom: 8px;">
      <span class="btn-label-icon left fa fa-plus"></span>Nueva bodega
    </a>

    
    <br style="clear: both;">

    <div class="panel">
      <div class="panel-body">
        	<div class="table-danger">

					<form action="../process/documento/accion-documento-entrada.php" id="frm-compra" name="frm-compra" method="post"  class="form_sdv form-horizontal" enctype="multipart/form-data"> 
   						
   						<input type="hidden" id="id" name="id">
   						<input type="hidden" id="id_tipo_documento" name="id_tipo_documento" value="2" />
   						<input type="hidden" id="cliente_id" name="cliente_id">
   						
   						<div class="row">

   							<div class="col-md-6">
								<label class="control-label">Proveedor</label>
								<input class="form-control form-group-margin" type="text" id="text_proveedor" name="proveedor"/>
							</div>
                       
	                        <div class="col-md-4">
	                            <label class="control-label">Fecha:</label>
	                            <input id="fecha_documento" name="fecha_documento" type="text" class="fechaIn form-control form-group-margin" readonly="readonly">
	                        </div>
	                        
	                        <div class="col-md-1">
	                            <label class="control-label">Periodo:</label>
	                            <input id="periodo" name="periodo" type="text" class="form-control form-group-margin" readonly="readonly">
	                        </div>
	                        
	                        <div class="col-md-1">
	                            <label class="control-label">Año: </label>
	                            <input id="year" name="year" type="text" class="form-control form-group-margin" readonly="readonly">
	                        </div>
                        
	                        <div class="col-md-2">
	                            <label class="control-label">Moneda:</label>
	                            <select name="id_moneda" id="id_moneda" class="form-control form-group-margin">
	                                <option value="">Seleccione</option>
	                                <?php $opciones = $oGlobals->verOpcionesPor("monedas", "", 1);
										  foreach($opciones as $opcion){
									?>	
												<option value="<?php echo $opcion[0]?>"><?php echo utf8_encode($opcion[1]);?></option>		
									<?php }?>
	                            </select>
	                        </div>
                        
	                        <div class="col-md-2">
	                            <label class="control-label">TRM:</label>
	                            <input id="trm" name="trm" type="text" class="form-control form-group-margin">
	                        </div>
	                        
	                        <div class="col-md-2">
	                            <label class="control-label">Tipo:</label>
	                            <select name="tipo_compra" id="tipo_compra" class="form-control form-group-margin">
	                                <option value="">Seleccione</option>
	                                <?php $opciones = $oGlobals->verOpcionesPor("tipos_compras", "", 1);
										  foreach($opciones as $opcion){
									?>	
												<option value="<?php echo $opcion[0]?>"><?php echo utf8_encode($opcion[1]);?></option>		
									<?php }?>
	                            </select>
	                        </div>
                        
	                        <div class="col-md-2">
	                            <label class="control-label">Valor Cubicaje:</label>
	                            <input id="cubicaje" name="cubicaje" type="text" class="form-control form-group-margin">
	                        </div>

	                        <div class="col-md-2">
		                        <label class="control-label">Empresa</label>
		                        <select class="form-control form-group-margin" id="id_empresa" name="id_empresa">
		                            <option value="">Seleccione</option>
		                            <?php 
		                                $empresas = $oGlobals->verOpcionesPor("empresas", $con_empresa, 1);
		                                foreach ($empresas as $empresa) {
		                            ?>
		                                    <option value="<?= $empresa["id"];?>"><?= $empresa["nombre_empresa"];?></option>
		                            <?php
		                                }
		                            ?>
		                        </select>
		                    </div>

		                    <div class="col-md-2">
	                            <label class="control-label">Bodega:</label>
	                            <select name="bodega_entrada" id="bodega_entrada" class="form-control form-group-margin">
	                                <option value="">Seleccione</option>
	                                <?php $opciones = $oGlobals->verOpcionesPor("bodegas", "".$con_emp, 1);
										  foreach($opciones as $opcion){
									?>	
												<option value="<?= $opcion[2]?>"><?= utf8_encode($opcion[1])." (".$opcion[2].")";?></option>		
									<?php }?>
	                                
	                            </select>
	                        </div>
                        
	                        <div class="col-md-12">
	                            <label class="control-label">Observación:</label>
	                            <textarea id="obs" name="obs" class="form-control form-group-margin"></textarea>
	                        </div>
                        
                    </div>
                        
                        <br />
                        
						<div id="rsp-frm-compra"></div>
						
						<div class="panel-footer text-right">
							<button class="btn btn-primary darker" type="button" onClick="location.href='../documentos/menu_consultar-entradas.html'">Volver</button>
							<button class="btn btn-primary darker" type="submit">Guardar</button>
						</div>
						
					</form>         
					<br style="clear:both;" />
			</div>
     	</div>
    </div>

    <div class="modal fade" id="load_modulo_proveedor" role="dialog"></div>
    <div class="modal fade" id="load_modulo_bodega" role="dialog"></div>