
        <div class="page-header">
            <div class="col-md-12 text-xs-center text-md-left ">
              <h1>
                <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-cube"></i>Inventarios /</span>
                Consultar inventario
              </h1>
            </div>
        </div>

		
		<div class="panel">
 
			  <div class="panel-body">
    			<div class="table-primary">
		
					<form id="frm-listas" name="frm-listas" class="form_sdv form-horizontal" method="post" action="../process/inventario/consultar-inventario.php">	

						<div class="col-md-4">
							<label class="control-label">Referencia</label>
							<input type="text" id="txt_producto" name="txt_producto" class="form-control form-group-margin">
						</div>

						<div class="col-md-2">
							<label class="control-label">Categoría</label>
							<select type="text" id="categoria" name="categoria" class="form-control form-group-margin">
								<option value="">Seleccione</option>	
								<?php 
									$categorias = $oGlobals->verOpcionesPor("categorias", $con_emp, 1);
									foreach ($categorias as $categoria) {
								?>
										<option value="<?= $categoria["id"];?>"><?= utf8_encode($categoria["categoria"]);?></option>
								<?php
									}
								?>
							</select>
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
							<label class="control-label">Bodega</label>
							<select type="text" id="bodega" name="bodega" class="form-control form-group-margin">
								<option value="">Seleccione</option>	
								<?php 
									$categorias = $oGlobals->verOpcionesPor("bodegas", $con_emp, 1);
									foreach ($categorias as $categoria) {
								?>
										<option value="<?= $categoria["codigo_bodega"];?>"><?= utf8_encode($categoria["codigo_bodega"]);?></option>
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