    
    <div class="page-header">
        <div class="col-md-4 text-xs-center text-md-left text-nowrap">
          <h1>
            <span class="text-muted font-weight-light"><i class="page-header-icon ion-arrow-graph-up-right"></i>Finanzas/ </span>
            Movimientos
          </h1>
        </div>
    </div>

    <div class="panel">
      <div class="panel-body">
        <div class="table-primary">
            		
                    
                    <a href="#load_talla" onClick="Funciones.cargar_modal_estructura('0', 'movimiento', 'load_talla', 2);" class="btn btn-primary btn-outline" data-toggle="modal" style="float: right;">
                      <span class="btn-label-icon left fa fa-plus"></span>Nuevo movimiento
                    </a>
                    <br /><br />
            
                        
                    <div id="rsp-frm-consulta-bodega" class="tabletable">
                    
                    	<?php $movimientos = $oGlobals->verOpcionesPor("tipos_movimientos", " AND financiero = 1 ORDER BY id_empresa ASC", 1);
                              include 'tablas/tb-movimientos.php';
                        ?>
   
                    </div> 
                    
                    <div id="load_talla" class="modal fade" role="dialog"></div> 

            </div>
        </div>
    </div>    

        

    	
  