	<div class="page-header">
        <div class="col-md-12 text-xs-center text-md-left">
          <h1>
          	<span class="text-muted font-weight-light"><i class="page-header-icon ion-arrow-graph-up-right"></i>Financiero /</span>
            Nueva causación de gastos
          </h1>
        </div>
    </div> 
    
    <div class="panel">
      <div class="panel-body">
        	<div class="table-danger">

					<form action="../process/finanzas/accion-documento-finanzas.php" id="frm-factura" name="frm-factura" method="post"  class="form_sdv form-horizontal" enctype="multipart/form-data"> 
   						
   						<input type="hidden" id="id_documento" name="id">
   						<input type="hidden" id="id_tipo_documento" name="id_tipo_documento" value="16" />
   						<input type="hidden" id="cliente_id" name="cliente_id">
   						
						<div class="row">                            
							
							<div class="col-md-6">
								<label class="control-label">Detalle</label>
								<input class="form-control form-group-margin" type="text" id="detalle" name="detalle"/>
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
								<label class="control-label">Fecha de emisión</label>
								<input readonly class="fechaIn form-control form-group-margin" type="text" id="fecha_documento" name="fecha_documento"/>
							</div>



							<div class="col-md-1">
								<label class="control-label">Periodo</label>
								<input readonly class="fechaIn form-control form-group-margin" type="text" id="periodo" name="periodo"/>
							</div>

							<div class="col-md-1">
								<label class="control-label">Año</label>
								<input readonly class="fechaIn form-control form-group-margin" type="text" id="year" name="year"/>
							</div>
        
                            <div class="col-md-12">
								<label class="control-label">Observaciones</label>
								<textarea rows="3" class="form-control form-group-margin" id="obs" name="obs"></textarea>
							</div>

						</div>
                        
                        <br />
                        
						<div id="rsp-frm-factura"></div>
						
						<div class="panel-footer text-right">
							<button class="btn btn-danger" type="button" onClick="location.href='../help-desk'">Volver</button>
							<button class="btn btn-danger" type="submit">Guardar</button>
						</div>
						
					</form>         
					<br style="clear:both;" />
			</div>
     	</div>
    </div>