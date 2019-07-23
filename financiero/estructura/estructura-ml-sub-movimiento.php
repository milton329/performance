    
    <div class="modal-dialog">
    
      <div class="modal-content" >

        <div class="modal-header bg-primary darker">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:#FFFFFF"><strong>Submovimientos de <?= utf8_encode($movimiento["tipo_movimiento"]);?></strong></h3>
        </div>
        

        <div class="modal-body">	
        		
               <div id="frm-modulo-opcion" style="display: none">
               		<?php include '../../financiero/frm/frm-sub-movimiento.php'?>
               </div>

               <div id="div-modulo-opcion">
               
               		<a onClick="Funciones.toggle_divs('div-modulo-opcion', 'frm-modulo-opcion');" class="btn btn-primary btn-outline" style="float: right;">
                      <span class="btn-label-icon left fa fa-plus"></span>Nuevo
                    </a>
					
                    <br /><br />
                    			               
               		<?php include '../../financiero/tablas/tabla-submovimientos.php'?>
               </div>	
        </div>
      
    </div>	
  </div>
            
                