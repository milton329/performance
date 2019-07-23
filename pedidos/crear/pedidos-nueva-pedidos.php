	<div class="page-header">
        <div class="col-md-4 text-xs-center text-md-left text-nowrap">
          <h1>
          	<span class="text-muted font-weight-light"><i class="page-header-icon fa fa-file-o"></i>Documentos / Pedidos /</span>
            Nuevo Pedido
          </h1>
        </div>
    </div> 

    <a href="#load_modulo_cliente" onclick="Funciones.cargar_modal_estructura('0', 'nuevo_cliente', 'load_modulo_cliente', 2);" class="btn btn-xs btn-primary btn-outline" data-toggle="modal" style="float: right; margin-left: 5px; margin-bottom: 8px;">
      <span class="btn-label-icon left fa fa-plus"></span>Nuevo cliente
    </a>
    
    <br style="clear: both;">

    <div class="panel">
      <div class="panel-body">
        	<div class="table-danger">

					<form action="../process/pedido/accion-documento-pedidos.php" id="frm-cotizacion" name="frm-compra" method="post"  class="form_sdv form-horizontal" enctype="multipart/form-data"> 
   						
   						<input type="hidden" id="id" name="id">
   						<input type="hidden" id="id_tipo_documento" name="id_tipo_documento" value="3" />
   						<input type="hidden" id="cliente_id" name="cliente_id">
   						
   						<div class="row">
                     
	          
                            <div class="col-md-6">
								<label class="control-label">Cliente</label>
								<input class="form-control form-group-margin" type="text" id="text_cliente" name="text_cliente"/>
							</div>
                           
							<div class="col-md-6">
								<label class="control-label">Identificación</label>
								<input class="form-control form-group-margin" type="text" id="identificacion" name="cliente_identificacion"/>
							</div>
                           
                           	<div class="col-md-4">
								<label class="control-label">Ciudad</label>
								<input class="form-control form-group-margin" type="text" id="ciudad" name="cliente_ciudad"/>
							</div>
                           
							<div class="col-md-4">
								<label class="control-label">Dirección:</label>
								<input type="text" id = "direccion" name = "cliente_direccion" class="form-control form-group-margin"/>
							</div>

							<div class="col-md-4">
								<label class="control-label">Teléfono:</label>
								<input type="text" id = "telefono" name = "cliente_telefono" class="form-control form-group-margin"/>
							</div>

							<div class="col-md-12">
								<label class="control-label">E-mail:</label>
								<input type="text" id = "email" name = "cliente_email" class="form-control form-group-margin"/>
							</div>

	                        <div class="col-md-12">
	                            <label class="control-label">Observación:</label>
	                            <textarea id="obs" name="obs" class="form-control form-group-margin"></textarea>
	                        </div>
                        
                    </div>
                        
                        <br />
                        
						<div id="rsp-frm-cotizacion"></div>
						
						<div class="panel-footer text-right">
							<button class="btn btn-primary darker" type="button" onClick="location.href='../pedidos/consultar-pedidos.html'">Volver</button>
							<button class="btn btn-primary darker" type="submit">Guardar</button>
						</div>
						
					</form>         
					<br style="clear:both;" />
			</div>
     	</div>
    </div>

    <div class="modal fade" id="load_modulo_cliente" role="dialog"></div>
    <div class="modal fade" id="load_modulo_bodega" role="dialog"></div>