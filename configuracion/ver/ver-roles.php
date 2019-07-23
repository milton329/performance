<div class="page-header">
    <div class="col-md-4 text-xs-center text-md-left text-nowrap">
      <h1>
      	<span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-pulse-strong"></i>Configuración / </span>
        Roles
      </h1>
    </div>
</div> 

<div class="panel">
  <div class="panel-body">
    <div class="table-danger">
    
    	<a href="#load_rol" onClick="Funciones.cargar_modal_estructura('0', 'config_roles', 'load_rol', 1);" class="btn btn-danger btn-outline" data-toggle="modal" style="float: right;">
          <span class="btn-label-icon left fa fa-plus"></span>Nuevo
        </a>
        
        <br /><br />
    
        <?php 
        
            $roles = $oGlobals->verOpcionesPor("config_roles", "", 1);
            if($roles != 2)   include '../configuracion/tablas/tabla-roles.php';
            else 			  echo "<br>No se ha creado ningún módulo creado";
        
        ?>
        	<div id="load_rol" class="modal fade" role="dialog"></div> 
      
    </div>
  </div>
</div>



    

 

