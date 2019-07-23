	
	<div class="modal-dialog">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Nueva Bodega</h4>

			</div>
			
			<form class="form_sdv" action="../process/utilidad/accion-bodega.php" method="post" id="frm-ficha-bodega">
				
				<input type="hidden" id="codigo" name="codigo" value="" class="form-control form-group-margin" />
				
				<div class="modal-body">

                    <input type="hidden" name="id_empresa" id="id_empresa" value="1" />
                    <input type="hidden" name="inventario_activo" id="inventario_activo" value="1" />


					<div class="col-md-6">
                    <label class="control-label">Empresa</label>
                    <select class="form-control form-group-margin" id="id_empresa" name="id_empresa">
                    <option value="">Seleccione</option>
	                <?php 
	                    $empresas = $oGlobals->verOpcionesPor("empresas", "", 1);
	                    foreach ($empresas as $empresa) {
	                ?>
	                        <option value="<?= $empresa["id"];?>"><?= $empresa["nombre_empresa"];?></option>
                    <?php
                    }
                    ?>
                   </select>
                   </div>

                   <div class="col-md-6 form-group">
                        <label class="control-label">Codigo de Bodega:</label>
                        <input value="" id="codigo_bodega" name="codigo_bodega" type="text" class="form-control form-group-margin" value="">
                    </div>

                    <div class="col-md-12 form-group">
                        <label class="control-label">Nombre de Bodega:</label>
                        <input value="" id="nombre_bodega" name="nombre_bodega" type="text" class="form-control form-group-margin" value="">
                    </div>

                     <div class="col-md-12 form-group">
                        <label class="control-label">Descripcion de Bodega:</label>
                        <input value="" id="descripcion_bodega" name="descripcion_bodega" type="text" class="form-control form-group-margin" value="">
                    </div>

                    

                    
                    
                   	<br style="clear: both" />	
					<div id="rsp-frm-ficha-bodega"></div>
					
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
				
			</form>	
		</div>
	</div>