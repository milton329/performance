
        <div class="page-header">
            <div class="col-md-12 text-xs-center text-md-left ">
              <h1>
                <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-cubes"></i>Documentos / Cotizaciones /</span>
                Consultar Cotización
              </h1>
            </div>
        </div>

		
		<div class="panel">
 
			  <div class="panel-body">
    			<div class="table-primary">
		
					<form id="frm-consulta-cotizaciones" name="frm-consulta-cotizaciones" class="form_sdv form-horizontal" method="post" action="../process/documento/consultar-documentos.php">	

						<input type="hidden" name="tipo" id="tipo" value="1">

						<div class="col-md-3">
			                <label class="control-label">Cliente</label>
			                <input id="text_cliente" name="cliente" class="form-control form-group-margin" />
			            </div>

						<div class="col-md-2">
							<label class="control-label">Documento</label>
							<input type="text" id="documento" name="documento" class="form-control form-group-margin">
						</div>

						<div class="col-md-2">
							<label class="control-label">Fecha inicial</label>
							<input type="text" id="fecha_inicial" name="fecha_inicial" class="fechaIn form-control form-group-margin" readonly>
						</div>

						<div class="col-md-2">
							<label class="control-label">Fecha final</label>
							<input type="text" id="fecha_final" name="fecha_final" class="fechaIn form-control form-group-margin" readonly>
						</div>

						
						<div class="col-md-1">
							<button type="submit" style="border: none; background: #FFF; margin-top: 22px; font-size: 20px;"><i class="fa fa-play" aria-hidden="true"></i></button> 
						</div>

					</form>
    	
					<br style="clear: both" />
					<br style="clear: both" />

					<div id="rsp-elidal"></div>

					<div id="rsp-frm-consulta-cotizaciones" class="tabletable">
                    
                    	<?php 
                        $id_empresa = $_SESSION["id_empresa"];
                        $cotizaciones = $oGlobals->verOpcionesPor("mov", "AND id_empresa= '$id_empresa' AND tipo_documento='COT' ORDER BY id ASC", 1);
                              include 'tablas/tb-documentos-cotizaciones.php';
                        ?>
   
                    </div> 
				  </div>
			</div> 
		</div>
    
    
    <div id="load_planilla" class="modal fade" role="dialog"></div>