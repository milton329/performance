    
    <div class="page-header">
        <div class="col-md-4 text-xs-center text-md-left text-nowrap">
          <h1>
            <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-cogs"></i>Utilidades / </span>
            Ver Actividades Economicas
          </h1>
        </div>
    </div>

    <div class="panel">
      <div class="panel-body">
        <div class="table-primary">
            		
                    
                    <a href="#load_talla" onClick="Funciones.cargar_modal_estructura('0', 'nuevo_ciiu', 'load_talla', 2);" class="btn btn-primary btn-outline" data-toggle="modal" style="float: right;">
                      <span class="btn-label-icon left fa fa-plus"></span>Nueva Acitividad Economica
                    </a>
                    <br /><br />
            
                        
                    <div id="rsp-frm-consulta-ciiu" class="tabletable">
                    
                    	<?php $bodegas = $oGlobals->verOpcionesPor("ciiu", " ORDER BY ID ASC", 1);
                              include 'tablas/tb-ciiu.php';
                        ?>
   
                    </div> 
                    
                    <div id="load_talla" class="modal fade" role="dialog"></div> 

            </div>
        </div>
    </div>    

        

    	
  