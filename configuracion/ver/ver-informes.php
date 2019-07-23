<div class="page-header">
    <div class="col-md-4 text-xs-center text-md-left text-nowrap">
      <h1>
      	<span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-pulse-strong"></i>Informes / </span>
        Ver informes 
      </h1>
    </div>
</div> 

<div class="panel">
  <div class="panel-body">
    <div class="table-danger">
    
    	<a href="#load_informe" onClick="Funciones.cargar_modal_estructura('0', 'informes', 'load_informe', 1);" class="btn btn-danger btn-outline" data-toggle="modal" style="float: right;">
          <span class="btn-label-icon left fa fa-plus"></span>Nuevo
        </a>
        
        <br /><br />
    
        <?php 
        	
			$sql = "SELECT informes.*, cm.modulo, cmo.opcion_modulo
					FROM informes
					LEFT JOIN config_modulos AS cm ON informes.id_modulo = cm.id
					LEFT JOIN config_modulos_opciones AS cmo ON informes.id_modulo_opcion = cmo.id";
			
            $informes = $oGlobals->verPorConsultaPor($sql, 1);
            if($informes != 2) include '../configuracion/tablas/tabla-informes.php';
            else 			  echo "<br>No se ha creado ningún informe";
        
        ?>
        	<div id="load_informe" class="modal fade" role="dialog"></div> 
      
    </div>
  </div>
</div>



    

 

