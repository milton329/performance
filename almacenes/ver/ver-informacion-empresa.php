<div class="page-header">
    <div class="col-md-4 text-xs-center text-md-left text-nowrap">
      <h1>
        <span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-pulse-strong"></i>Configuración / </span>
        Ver información de la empresa
      </h1>
    </div>
</div> 

<div class="panel">
  <div class="panel-body">
    <div class="table-primary">
    
    	<a href="#load_informe" onClick="Funciones.cargar_modal_estructura('0', 'empresa', 'load_informe', 2);" class="btn btn-primary btn-outline" data-toggle="modal" style="float: right;">
          <span class="btn-label-icon left fa fa-plus"></span>Nuevo
        </a>
        
        <br /><br />
    
        <?php 
       
			
            $empresas = $oGlobals->verOpcionesPor("config_informacion_empresa", "", 1);
            if($empresas != 2) include '../almacenes/tablas/tabla-informacion.php';
            else 			  echo "<br>No hay información de la empresa creada";
        
        ?>
        	<div id="load_informe" class="modal fade" role="dialog"></div> 
      
    </div>
  </div>
</div>



    

 

