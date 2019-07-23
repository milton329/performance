
        <div class="page-header">
            <div class="col-md-12 text-xs-center text-md-left ">
              <h1>
                <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-cubes"></i>Documentos / </span>
                Facturación
              </h1>
            </div>
        </div>

		
		<div class="panel">
	  
			<div class="panel-title">
			Listado de documentos
			<div class="panel-heading-controls">
			  <a href="../documentos/nueva-entrada.html" class="btn btn-xs btn-primary btn-outline btn-outline-colorless">Nuevo documento</a>
			</div>
			</div>

      		<hr class="m-a-0">
 
			  <div class="panel-body">
    			<div class="table-primary">
		
					<form id="frm-listas" name="frm-listas" class="form_sdv form-horizontal" method="post" action="../process/asistencia/consultar-asistencia.php">	

						<input type="hidden" id="tipo" name="tipo" value="1" />

						<div class="col-md-2">
							<label class="control-label">Fecha inicial</label>
							<input type="text" id="fecha_ini" name="fecha_ini" class="fechaIn form-control form-group-margin" readonly>
						</div>

						<div class="col-md-2">
							<label class="control-label">Fecha final</label>
							<input type="text" id="fecha_fin" name="fecha_fin" class="fechaIn form-control form-group-margin" readonly>
						</div>

						<div class="col-md-2">
							<label class="control-label">Tipo documento</label>
							<select id="id_sede" name="id_sede" class="form-control form-group-margin" onChange="Funciones.cargar_select('id_sede', 'id_sede', 'id_grupo', 'grupos', 0, 1);">
	                        	<option value="">Seleccione</option>
	                        	<?php 
									
									$tipos = $oGlobals->verOpcionesPor("tipos_documentos", " AND naturaleza = 0", 1);
									if($tipos != 2){
										foreach($tipos as $tipo){
								?>
											<option value="<?= utf8_encode($tipo["id"]);?>"><?= utf8_encode($tipo["tipo_documento"]);?></option>
								<?php			
										}		
									}
								?>
							</select>
						</div>

						<div class="col-md-1">
							<button type="submit" style="border: none; background: #FFF; margin-top: 22px; font-size: 20px;"><i class="fa fa-play" aria-hidden="true"></i></button> 
						</div>

					</form>
    	
					<br style="clear: both" />
					<br style="clear: both" />

					<div id="rsp-elidal"></div>

					<div id="rsp-frm-listas" class="table-responsive">

					</div>
				  </div>
				 </div> 
	</div>
    
    
    <div id="load_planilla" class="modal fade" role="dialog"></div>