    
    <div class="modal-dialog modal-lg">
    
      <div class="modal-content" >
        
        <div class="modal-header" style=" background-color:#d74f3f; text-align:center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:#FFFFFF"><?= utf8_encode($modulo["modulo"]);?> / opciones de menú </strong></h3>
        </div>
        
        <div class="modal-body paddin" style=" background: #f6f6f6;">	
        		
               <div id="frm-modulo-opcion" style="display: none">
               		<?php include '../../configuracion/frm/frm-config_modulos_opciones.php'?>
               </div>

               <div id="div-modulo-opcion">
               
               		<a onClick="Funciones.toggle_divs('div-modulo-opcion', 'frm-modulo-opcion');" class="btn btn-danger btn-outline" style="float: right;">
                      <span class="btn-label-icon left fa fa-plus"></span>Nuevo
                    </a>
					
                    <br /><br />
                    			               
               		<?php include '../../configuracion/tablas/tabla-modulos-opciones.php'?>
               </div>	
        </div>
      
    </div>	
            
                