
        <div class="page-header">
            <div class="col-md-12 text-xs-center text-md-left ">
              <h1>
                <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-cubes"></i>Documentos / Entradas /</span>
                Consultar entradas
              </h1>
            </div>
        </div>

		
		<div class="panel">
 
			  <div class="panel-body">
    			<div class="table-primary">
		
					<form id="frm-listas" name="frm-listas" class="form_sdv form-horizontal" method="post" action="../process/documento/consultar-documentos.php">	

						<input type="hidden" name="tipo" id="tipo" value="1">

						<div class="col-md-3" style="display: none;">
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

						<div class="col-md-2">
							<label class="control-label">Tipo documento</label>
							<select id="tipo_documento" name="tipo_documento" class="form-control form-group-margin" onChange="Funciones.cargar_select('id_sede', 'id_sede', 'id_grupo', 'grupos', 0, 1);">
	                        	<option value="">Seleccione</option>
	                        	<?php 
									
									$tipos = $oGlobals->verOpcionesPor("tipos_documentos", " AND naturaleza = 1", 1);
									if($tipos != 2){
										foreach($tipos as $tipo){
								?>
											<option value="<?= utf8_encode($tipo["codigo"]);?>"><?= utf8_encode($tipo["tipo_documento"]);?></option>
								<?php			
										}		
									}
								?>
							</select>
						</div>
						<?php if($_SESSION["tipo_rol"] == 1){?>
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
		                <?php }?>
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