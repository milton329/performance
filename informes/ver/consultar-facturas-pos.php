
        <div class="page-header">
            <div class="col-md-12 text-xs-center text-md-left ">
              <h1>
                <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-bar-chart"></i>Informes / Pos / </span>
                Consultar Facturas 
              </h1>
            </div>
        </div>

		
		<div class="panel">
 
			  <div class="panel-body">
    			<div class="table-primary">
		
					<form id="frm-listas" name="frm-listas" class="form_sdv form-horizontal" method="post" action="../process/informes/informe-financiero-pyg.php">	

						<div class="col-md-2">
							<label class="control-label">Fecha inicial</label>
							<input type="text" id="fecha_inicial" name="fecha_inicial" class="fechaIn form-control form-group-margin" readonly>
						</div>

						<div class="col-md-2">
							<label class="control-label">Fecha final</label>
							<input type="text" id="fecha_final" name="fecha_final" class="fechaIn form-control form-group-margin" readonly>
						</div>

                        <div class="col-md-2">
                            <label class="control-label">Documento</label>
                            <input type="text" id="fecha_final" name="fecha_final" class="form-control form-group-margin">
                        </div>

						<div class="col-md-2">
							<label class="control-label">Almacen</label>
							<select class="form-control form-group-margin" id="almacen" name="almacen">
                                <option value="">Seleccione</option>
                                <?php 
                                    $empresas = $oGlobals->verOpcionesPor("almacenes", $con_empresa, 1);
                                    foreach ($empresas as $empresa) {
                                ?>
                                        <option value="<?= $empresa["codigo"];?>" selected><?= $empresa["nombre"];?></option>
                                <?php
                                    }
                                ?>
                            </select>
						</div>

						<div class="col-md-2">
							<label class="control-label">Caja</label>
							<select type="text" id="caja" name="caja" class="form-control form-group-margin">
                                <option value="">Seleccione</option>    
                                <?php 
                                    $categorias = $oGlobals->verOpcionesPor("pos_cajas", $con_emp, 1);
                                    foreach ($categorias as $categoria) {
                                ?>
                                        <option value="<?= $categoria["codigo"];?>"><?= utf8_encode($categoria["nombre"]);?></option>
                                <?php
                                    }
                                ?>
                            </select>
						</div>

						<div class="col-md-1">
							<label class="control-label">Cajero</label>
							<select type="text" id="caja" name="caja" class="form-control form-group-margin">
                                <option value="">Seleccione</option>    
                                <?php 
                                    $categorias = $oGlobals->verOpcionesPor("pos_cajas", $con_emp, 1);
                                    foreach ($categorias as $categoria) {
                                ?>
                                        <option value="<?= $categoria["codigo"];?>"><?= utf8_encode($categoria["nombre"]);?></option>
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

					<?=include 'tablas/tb-facturas-pos-defecto.php';?>

					</div>
				  </div>
			</div> 
		</div>
    
    
<div id="load_informe" class="modal fade" role="dialog"></div> 