
        <div class="page-header">
            <div class="col-md-12 text-xs-center text-md-left ">
              <h1>
                <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-shopping-basket"></i>POS de Facturacion/</span>
                Realizar Apertura POS
              </h1>
            </div>
        </div>

		
		<div class="panel">
 
			  <div class="panel-body">
    			<div class="table-primary">

                
                  <?php
                  //verificar si el usuario tiene un cuadre abierto en el sistema
                  $apertura="SELECT * FROM pos_cuadre
			        where CAJERO='".$_SESSION["usuario"]."' and CERRADO='0'";
			      $dato_apertura = $oGlobals->verPorConsultaPor($apertura, 0);
			        
			      $id=$dato_apertura['ID'];
			      $numero=$dato_apertura['NUMERO'];
			      $fecha=$dato_apertura['FECHA'];
			      $valor=$dato_apertura['VALOR'];

			      if($id!= ""){
			      //hay un cuadre pendiente
			      include 'tablas/tb-apertura-dark.php';	
			      }
			      if($id== ""){
                  ?>


		
					<form id="frm-listas" name="frm-listas" class="form_sdv form-horizontal" method="post" action="../process/inventario/consultar-inventario.php">	

						<div class="col-md-2">
	                        <label class="control-label">Almacen</label>
	                        <select class="form-control form-group-margin" id="id_empresa" name="id_empresa">
	                            <option value="">Seleccione</option>
	                            <?php 
	                                $empresas = $oGlobals->verOpcionesPor("almacenes", $con_empresa, 1);
	                                foreach ($empresas as $empresa) {
	                            ?>
	                                    <option value="<?= $empresa["nombre"];?>"><?= $empresa["nombre"];?></option>
	                            <?php
	                                }
	                            ?>
	                        </select>
	                    </div>

						<div class="col-md-2">
							<label class="control-label">Caja</label>
							<select type="text" id="bodega" name="bodega" class="form-control form-group-margin">
								<option value="">Seleccione</option>	
								<?php 
									$categorias = $oGlobals->verOpcionesPor("pos_cajas", $con_emp, 1);
									foreach ($categorias as $categoria) {
								?>
										<option value="<?= $categoria["nombre"];?>"><?= utf8_encode($categoria["nombre"]);?></option>
								<?php
									}
								?>
							</select>
						</div>

						<div class="col-md-1">
							<button class="btn btn-primary darker" type="submit" style="margin-top: 22px; font-size: 16px;">Apertura</button> 
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

    <?php
}
?>