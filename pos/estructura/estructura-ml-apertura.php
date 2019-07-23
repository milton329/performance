
        <form class="form_sdv" action="../process/pos/accion-generar-apertura.php" method="post" id="frm-realizar-apertura" name="frm-realizar-apertura">
				
				<input type="hidden" id="codigo" name="codigo" value="" class="form-control form-group-margin" />
				
				<div class="modal-body">


                    <div class="col-md-6 form-group">
                        <label class="control-label">Nombre:</label>
                        <input value="<?=$nombre?>" id="nombre" name="nombre" type="text" class="form-control form-group-margin" required readonly/> 
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="control-label">Cajero:</label>
                        <input value="<?=$cajero?>" id="cajero" name="cajero" type="text" class="form-control form-group-margin" required readonly/>
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="control-label">Almacen:</label>
                            <select class="form-control form-group-margin" id="almacen" name="almacen">
                                <option value="" require>Seleccione</option>
                                <?php 
                                    $empresas = $oGlobals->verOpcionesPor("almacenes", $con_empresa, 1);
                                    foreach ($empresas as $empresa) {
                                ?>
                                        <option value="<?= $empresa["codigo"];?>"><?= $empresa["nombre"];?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-6 form-group">
                        <label class="control-label">Caja:</label>
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
                        <div class="col-md-12 form-group">
                        <label class="control-label">Base:</label>
                        <input value="300000" id="valor" name="valor" type="text" class="form-control form-group-margin" required> 
                    </div>
                    
                   	<br style="clear: both" />	
					<div id="rsp-frm-realizar-apertura"></div>
					
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-white">Cancelar</button>
					<button onclick="Funciones.realizar_apertura('1', 'frm-realizar-apertura', '1', 'rsp_id');" class="btn btn-primary">Apertura</button>
				</div>				
			</form>	
