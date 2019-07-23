    
    <?php 
		
		if($tabla == "opciones-modulo"){
			if($opciones != 2){
	?>
                <div class="panel">
                  <div class="panel-heading">
                    <span class="panel-title"><?= utf8_encode($modulo["modulo"]);?></span>
                  </div>
                  
                  <?php 
                    
                     
                        foreach($opciones as $opcion){
                            
                            $asig = $oGlobals->verOpcionesPor("config_modulos_opciones_roles", " AND id_modulo_opcion = ".$opcion["id"]." AND id_modulo = $id_modulo AND id_rol = $id_rol", 0);
                  ?>
                          <div class="widget-messages-item unread">
                            <label class="widget-messages-checkbox custom-control custom-checkbox custom-control-blank">
                              <input style="background: #d74f3f !important;" type="checkbox" class="custom-control-input" <?php if($asig != 2){?>  checked="checked" <?php }?> onChange="Funciones.agregar_permiso('<?= $opcion["id_modulo"]."_".$opcion["id"]."_0_0_".$id_rol;?>', 'config_modulos_opciones_roles', 'rsp-var');"><span class="custom-control-indicator"></span>
                            </label>
                            <a style="width: 100% !important" href="" onClick="Funciones.cargar_modal_estructura('<?= $opcion["id"]."_".$id_rol;?>', 'opciones-tres-modulo', 'rsp-opc-mod-tres', 2);" title="" class="widget-messages-from"><?= utf8_encode($opcion["opcion_modulo"]);?></a>
                          </div>
                  <?php 
                        }
                     
                  ?>
                </div>
    <?php 
			}
		}
	?>      
    
    
    <?php 
		
		if($tabla == "opciones-tres-modulo"){
			
			$informes = $oGlobals->verOpcionesPor("informes", " AND id_modulo_opcion = $id_opcion", 1);
			
			if($opcion_tres != 2){
	?>
                <div class="panel">
                  <div class="panel-heading">
                    <span class="panel-title"><?= utf8_encode($opcion["opcion_modulo"]);?></span>
                  </div>
                  
                  <?php 
                    
                     
                        foreach($opcion_tres as $opc_tres){
     
                            $asig = $oGlobals->verOpcionesPor("config_modulos_opciones_tres_roles", " AND id_modulo_opcion = ".$opc_tres["id_opcion"]." AND id_modulo_opcion_tres = ".$opc_tres["id"]." AND id_rol = $id_rol", 0);
                  ?>
                          <div class="widget-messages-item unread">
                            <label class="widget-messages-checkbox custom-control custom-checkbox custom-control-blank">
                              <input type="checkbox" class="custom-control-input" <?php if($asig != 2){?>  checked="checked" <?php }?> onChange="Funciones.agregar_permiso('<?= $opc_tres["id_modulo"]."_".$opc_tres["id_opcion"]."_".$opc_tres["id"]."_0_".$id_rol;?>', 'config_modulos_opciones_tres_roles', 'rsp-var');"><span class="custom-control-indicator"></span>
                            </label>
                            <a href="" style="width: 100% !important" class="widget-messages-from"><?= utf8_encode($opc_tres["modulo_opcion_tres"]);?></a>
                          </div>
                  <?php 
                        }
                  ?>
                </div> 
    <?php   
			}
			
			if($informes != 2){
	?>        
                <div class="panel">
                    
                    <div class="panel-heading">
                    <span class="panel-title">Informes</span>
                  </div>
                  
                      <?php 
                         if($informes != 2){
                            foreach($informes as $informe){
         
                                $asig = $oGlobals->verOpcionesPor("config_modulos_opciones_tres_roles", " AND id_modulo_opcion = ".$informe["id_modulo_opcion"]." AND id_informe = ".$informe["id"]." AND id_rol = $id_rol", 0);
                      ?>
                              <div class="widget-messages-item unread">
                                <label class="widget-messages-checkbox custom-control custom-checkbox custom-control-blank">
                                  <input type="checkbox" class="custom-control-input" <?php if($asig != 2){?>  checked="checked" <?php }?> onChange="Funciones.agregar_permiso('<?= $informe["id_modulo"]."_".$informe["id_modulo_opcion"]."_0_".$informe["id"]."_".$id_rol;?>', 'config_modulos_opciones_tres_roles', 'rsp-var');"><span class="custom-control-indicator"></span>
                                </label>
                                <a href="" style="width: 100% !important" class="widget-messages-from"><?= utf8_encode($informe["nombre"]);?></a>
                              </div>
                      <?php 
                            }
                         }
                         else echo "<br /><center>No hay ninguna opción</center><br />";
                      ?>
                
                
                </div>
    <?php 	
			}
			
			
			
		}
	?>    
                