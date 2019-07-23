    
    <div class="page-header">
        <div class="col-md-4 text-xs-center text-md-left text-nowrap">
          <h1>
            <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-cogs"></i>Utilidades / </span>
            Ver Plan Unico de Cuentas
          </h1>
        </div>
    </div>

    <div class="panel">
      <div class="panel-body">
        <div class="table-primary">
            		
                    
                    <a href="#load_talla" onClick="Funciones.cargar_modal_estructura('0', 'nuevo_puc', 'load_talla', 2);" class="btn btn-primary btn-outline" data-toggle="modal" style="float: right;">
                      <span class="btn-label-icon left fa fa-plus"></span>Nueva Cuenta
                    </a>
                    <br /><br />
            
                        
                    <div id="rsp-frm-consulta-puc" class="tabletable">
                    
                    	<?php $bodegas = $oGlobals->verOpcionesPor("puc", " ORDER BY ID ASC", 1);
                              include 'tablas/tb-puc.php';
                        ?>
   
                    </div> 
                    
                    <div id="load_talla" class="modal fade" role="dialog"></div> 

            </div>
        </div>
    </div>    

        

    	
  