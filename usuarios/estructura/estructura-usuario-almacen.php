    
    <div class="modal-dialog modal-sm">
    
      <div class="modal-content" >
        
        <div class="modal-header" style=" background-color:#d74f3f; text-align:center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:#FFFFFF"><?= utf8_encode($usuario["nombre"])?> / Almacenes </strong></h3>
        </div>
        
        <div class="modal-body paddin" style=" background: #f6f6f6;">	
        		
			
            <div id="rsp-var"></div>
            
            <div class="row">
            
            	<div class="col-md-12">
					<div class="panel">
                      <div class="panel-heading">
                        <span class="panel-title">Almacenes</span>
                      </div>
                      
                      <?php 
						
						 if($almacenes != 2){
							foreach($almacenes as $almacen){
								
								$asig = $oGlobals->verOpcionesPor("usuarios_almacenes", " AND codigousuario = $id AND codigotienda = ".$almacen["id"]."", 0);
					  ?>
                      		  <div class="widget-messages-item unread">
                                <label class="widget-messages-checkbox custom-control custom-checkbox custom-control-blank">
                                  <input type="checkbox" class="custom-control-input" <?php if($asig != 2){?>  checked="checked" <?php }?> onChange="Funciones.agregar_permiso('<?= $almacen["id"]."_".$id;?>', 'usuarios_almacenes', 'rsp-var');"><span class="custom-control-indicator"></span>
                                </label>
                                <a href="" onClick="Funciones.cargar_modal_estructura('<?= $almacen["id"]."_".$id;?>', 'opciones-modulo', 'rsp-opc-mod', 2);" title="" class="widget-messages-from"><?= utf8_encode($almacen["nombre"]);?></a>
                              </div>
                      <?php 
							}
						 }
					  ?>
                      
                    </div>	
                </div>
                <div class="col-md-4" id="rsp-opc-mod"></div>
                <div class="col-md-4" id="rsp-opc-mod-tres"></div>
            
            </div>
            	
        </div>
      
    </div>	
            
                