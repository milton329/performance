    
    <div class="page-header">
        <div class="col-md-4 text-xs-center text-md-left text-nowrap">
          <h1>
            <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-unlock-alt"></i>Seguridad / </span>
           	Tipos de documento
          </h1>
        </div>
    </div>

    <div class="panel">
      <div class="panel-body">
        <div class="table-primary">
            		
                    <a href="#load_color" onClick="Funciones.cargar_modal_estructura('0', 'tipos_documento', 'load_color', 2);" class="btn btn-primary btn-outline" data-toggle="modal" style="float: right;">
                      <span class="btn-label-icon left fa fa-plus"></span>Nuevo tipo
                    </a>
                    <br /><br />
                        
                    <div id="rsp-frm-consulta-bodega" class="tabletable">
                    
                    	<?php $tipos = $oGlobals->verOpcionesPor("tipos_documentos", "".$con_emp , 1);
                              include 'tablas/tb-tipos-documento.php';
                        ?>
   
                    </div> 
                    
                    <div id="load_color" class="modal fade" role="dialog"></div> 

            </div>
        </div>
    </div>    

        

    	
  