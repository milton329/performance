	<div class="page-header">
        <div class="col-md-4 text-xs-center text-md-left text-nowrap">
          <h1>
          	<span class="text-muted font-weight-light"><i class="page-header-icon fa fa-cubes"></i> Documentos / Facturación /</span>
            Nueva factura
          </h1>
        </div>
    </div> 


	<a href="#load_modulo_cliente" onclick="Funciones.cargar_modal_estructura('0', 'nuevo_cliente', 'load_modulo_cliente', 2);" class="btn btn-xs btn-primary btn-outline" data-toggle="modal" style="float: right; margin-left: 5px; margin-bottom: 8px;">
      <span class="btn-label-icon left fa fa-plus"></span>Nuevo cliente
    </a>

    <a href="#load_modulo_bodega" onclick="Funciones.cargar_modal_estructura('0', 'nuevo_bodega', 'load_modulo_bodega', 2);" class="btn btn-xs btn-primary btn-outline" data-toggle="modal" style="float: right; margin-bottom: 8px;">
      <span class="btn-label-icon left fa fa-plus"></span>Nueva bodega
    </a>

	<br style="clear: both;">
	
    
    <div class="panel">
      <div class="panel-body">
        	<div class="table-danger">

					<form action="../process/documento/accion-documento.php" id="frm-factura" name="frm-factura" method="post"  class="form_sdv form-horizontal" enctype="multipart/form-data"> 
   						
   						<input type="hidden" id="id_documento" name="id">
   						<input type="hidden" id="id_tipo_documento" name="id_tipo_documento" value="1" />
   						<input type="hidden" id="cliente_id" name="cliente_id">
   						
						<div class="row">                            
							
                           	<div class="col-md-4">
								<label class="control-label">Fecha de emisión</label>
								<input readonly class="fechaIn form-control form-group-margin" type="text" id="fecha_documento" name="fecha_documento"/>
							</div>

							<div class="col-md-2">
								<label class="control-label">Periodo</label>
								<input readonly class="fechaIn form-control form-group-margin" type="text" id="periodo" name="periodo"/>
							</div>

							<div class="col-md-2">
								<label class="control-label">Año</label>
								<input readonly class="fechaIn form-control form-group-margin" type="text" id="year" name="year"/>
							</div>
                           
                           	<div class="col-md-4">
								<label class="control-label">Fecha vencimiento</label>
								<input readonly class="fechaIn form-control form-group-margin" type="text" id="fecha_vence" name="fecha_vence"/>
							</div>
                           
                           	<div class="col-md-6">
								<label class="control-label">Cliente</label>
								<input class="form-control form-group-margin" type="text" id="text_cliente" name="text_cliente"/>
							</div>
                           
							<div class="col-md-6">
								<label class="control-label">Identificación</label>
								<input class="form-control form-group-margin" type="text" id="identificacion" name="cliente_identificacion"/>
							</div>
                           
                           	<div class="col-md-4">
								<label class="control-label">Ciudad</label>
								<input class="form-control form-group-margin" type="text" id="ciudad" name="cliente_ciudad"/>
							</div>
                           
							<div class="col-md-4">
								<label class="control-label">Dirección:</label>
								<input type="text" id = "direccion" name = "cliente_direccion" class="form-control form-group-margin"/>
							</div>

							<div class="col-md-4">
								<label class="control-label">Teléfono:</label>
								<input type="text" id = "telefono" name = "cliente_telefono" class="form-control form-group-margin"/>
							</div>

							<div class="col-md-3">
								<label class="control-label">Celular:</label>
								<input type="text" id = "movil" name = "cliente_movil" class="form-control form-group-margin"/>
							</div>

							<div class="col-md-3">
								<label class="control-label">E-mail:</label>
								<input type="text" id = "email" name = "cliente_email" class="form-control form-group-margin"/>
							</div>

							<div class="col-md-3">
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

							<div class="col-md-3">
								<label class="control-label">Bodega</label>
								<select class="form-control form-group-margin" id="bodega_salida" name="bodega_salida">
									<option value="">Seleccione</option>
									<?php 
										$bodegas = $oGlobals->verOpcionesPor("bodegas", "".$con_emp, 1);
										foreach ($bodegas as $bodega) {
									?>
											<option value="<?= $bodega["codigo_bodega"];?>"><?= utf8_encode($bodega["codigo_bodega"]);?></option>
									<?php
										}
									?>
								</select>
							</div>

							<div class="col-md-2" style="display: none;">
								<label class="control-label">Categoría</label>
								<select class="form-control form-group-margin" id="id_categoria" name="id_categoria">
									<option value="">Seleccione</option>
									<?php 
										$categorias = $oGlobals->verOpcionesPor("categorias", "".$con_emp, 1);
										foreach ($categorias as $categoria) {
									?>
											<option value="<?= $categoria["id"];?>"><?= utf8_encode($categoria["categoria"]);?></option>
									<?php
										}
									?>
								</select>
							</div>
                            
                            <div class="col-md-12">
								<label class="control-label">Observaciones</label>
								<textarea rows="3" class="form-control form-group-margin" id="obs" name="obs"></textarea>
							</div>

						</div>
                        
                        <br />
                        
						<div id="rsp-frm-factura"></div>
						
						<div class="panel-footer text-right">
							<button class="btn btn-primary" type="button" onClick="location.href='../help-desk'">Volver</button>
							<button class="btn btn-primary" type="submit">Guardar</button>
						</div>
						
					</form>         
					<br style="clear:both;" />
			</div>
     	</div>
    </div>

    <div class="modal fade" id="load_modulo_cliente" role="dialog"></div>
    <div class="modal fade" id="load_modulo_bodega" role="dialog"></div>