	
	<div class="modal-dialog" id='modal-dialog'>
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Nuevo Cliente</h4>

			</div>
			
			<form class="form_sdv" action="../process/tercero/accion-tercero.php" method="post" id="frm-ficha-tercero">
				
				<input type="hidden" id="codigo" name="codigo" value="" class="form-control form-group-margin" />
				
				<div class="modal-body">

					<div class="col-md-12 form-group">
                        <label class="control-label">Identifiacion:</label>
                        <input value="" id="identificacion" name="identificacion" type="text" class="form-control form-group-margin" value="">
                    </div>

                    <div class="col-md-12 form-group">
                        <label class="control-label">Nombre:</label>
                        <input value="" id="nombre" name="nombre" type="text" class="form-control form-group-margin" value="">
                    </div>

                    <div class="col-md-12 form-group">
                        <label class="control-label">Apellido:</label>
                        <input value="" id="apellido" name="apellido" type="text" class="form-control form-group-margin" value="">
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="control-label">Telefono:</label>
                        <input value="" id="telefono" name="telefono" type="text" class="form-control form-group-margin" value="">
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="control-label">Cupo:</label>
                        <input value="" id="cupo    " name="cupo    " type="text" class="form-control form-group-margin" value="">
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="control-label">Ciudad:</label>
                        <input value="" id="txt_ciudad" name="ciudad" type="text" class="form-control form-group-margin" value="">
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="control-label">Direccion:</label>
                        <input value="" id="direccion" name="direccion" type="text" class="form-control form-group-margin" value="">
                    </div>
                    
                   	<br style="clear: both" />	
					<div id="rsp-frm-ficha-tercero"></div>
					
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
				
			</form>	
		</div>
	</div>