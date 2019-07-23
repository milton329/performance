    
    <div class="page-header">
        <div class="col-md-4 text-xs-center text-md-left text-nowrap">
          <h1>
            <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-briefcase"></i>Servicios / </span>
            Ver Servicios
          </h1>
        </div>
    </div>

    <div class="panel">
      <div class="panel-body">
        <div class="table-primary">
            		
                    
                    <a href="#load_talla" onClick="Funciones.cargar_modal_estructura('0', 'servicios', 'load_talla', 2);" class="btn btn-primary btn-outline" data-toggle="modal" style="float: right;">
                      <span class="btn-label-icon left fa fa-plus"></span>Nuevo Servicio
                    </a>
                    <br /><br />
            
                        
                    <div id="rsp-frm-consulta-servicios" class="tabletable">
                    
                    	<?php 
                        $id_empresa = $_SESSION["id_empresa"];
                        $servicios = $oGlobals->verOpcionesPor("servicios", "AND id_empresa= '$id_empresa' ORDER BY id_empresa ASC", 1);
                              include 'tablas/tb-servicios.php';
                        ?>
   
                    </div> 
                    
                    <div id="load_talla" class="modal fade" role="dialog"></div> 

            </div>
        </div>
    </div>    

        

    	
  