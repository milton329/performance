
        <div class="page-header">
            <div class="col-md-12 text-xs-center text-md-left ">
              <h1>
                <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-bar-chart"></i>Informes / Utilidad / </span>
                Informe de utilidad
              </h1>
            </div>
        </div>

		
		<div class="panel">
 
			  <div class="panel-body">
    			<div class="table-primary">
		
					<form id="frm-listas" name="frm-listas" class="form_sdv form-horizontal" method="post" action="../process/informes/informe-utilidad.php">	

						<div class="col-md-4">
							<label class="control-label">Referencia</label>
							<input type="text" id="txt_producto" name="txt_producto" class="form-control form-group-margin">
						</div>

						<div class="col-md-2">
							<label class="control-label">Categoría</label>
							<select type="text" id="categoria" name="categoria" class="form-control form-group-margin">
								<option value="">Seleccione</option>	
								<?php 
									$categorias = $oGlobals->verOpcionesPor("categorias", "", 1);
									foreach ($categorias as $categoria) {
								?>
										<option value="<?= $categoria["id"];?>"><?= utf8_encode($categoria["categoria"]);?></option>
								<?php
									}
								?>
							</select>
						</div>

						<div class="col-md-1">
							<button type="submit" style="border: none; background: #FFF; margin-top: 22px; font-size: 20px;"><i class="fa fa-search" aria-hidden="true"></i></button> 
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