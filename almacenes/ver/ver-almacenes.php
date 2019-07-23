<div class="page-header">
    <div class="col-md-4 text-xs-center text-md-left text-nowrap">
      <h1>
        <span class="text-muted font-weight-light"><i class="page-header-icon menu-icon fa fa-home"></i>Configuración / </span>
        Ver Almacenes de la Empresa
      </h1>
    </div>
</div> 

<div class="panel">
  <div class="panel-body">
    <div class="table-primary">
    
    	<a href="#load_informe" onClick="Funciones.cargar_modal_estructura('0', 'almacenes', 'load_informe', 2);" class="btn btn-primary btn-outline" data-toggle="modal" style="float: right;">
          <span class="btn-label-icon left fa fa-plus"></span>Nuevo Almacen
        </a>
        
        <br /><br />
    
        <?php 
       
			
            $empresas = $oGlobals->verOpcionesPor("almacenes", "", 1);
            if($empresas != 2) include '../almacenes/tablas/tabla-almacenes.php';
            else 			  echo "<br>No hay información de la empresa creada";
        
        ?>
        	<div id="load_informe" class="modal fade" role="dialog"></div> 
      
    </div>
  </div>
</div>



    

 

