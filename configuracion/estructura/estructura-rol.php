    
    <div class="modal-dialog modal-lg">
    
      <div class="modal-content" >
        
        <div class="modal-header" style=" background-color:#d74f3f; text-align:center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:#FFFFFF">CONFIGURACIÓN / Permisos de <?= utf8_encode($rol["rol"]);?></strong></h3>
        </div>
        
        <div class="modal-body paddin" style=" background: #f6f6f6;">	
        		
			
            <div id="rsp-var"></div>
            
            <div class="row">
            
            	<div class="col-md-4">
					<div class="panel">
                      <div class="panel-heading">
                        <span class="panel-title">Módulos</span>
                      </div>
                      
                      <?php 
						
						 if($modulos != 2){
							foreach($modulos as $modulo){
								
								$asig = $oGlobals->verOpcionesPor("config_modulos_roles", " AND id_rol = $id AND id_modulo = ".$modulo["id"]."", 0);
					  ?>
                      		  <div class="widget-messages-item unread">
                                <label class="widget-messages-checkbox custom-control custom-checkbox custom-control-blank">
                                  <input style="background: #d74f3f !important;" type="checkbox" class="custom-control-input" <?php if($asig != 2){?>  checked="checked" <?php }?> onChange="Funciones.agregar_permiso('<?= $modulo["id"]."_0_0_0_".$id;?>', 'config_modulos_roles', 'rsp-var');"><span class="custom-control-indicator"></span>
                                </label>
                                <a href="" onClick="Funciones.cargar_modal_estructura('<?= $modulo["id"]."_".$id;?>', 'opciones-modulo', 'rsp-opc-mod', 2);" title="" class="widget-messages-from"><?= utf8_encode($modulo["modulo"]);?></a>
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
            
                