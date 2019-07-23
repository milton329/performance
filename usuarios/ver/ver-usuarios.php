<div class="page-header">
    <div class="col-md-4 text-xs-center text-md-left text-nowrap">
      <h1>
      	<span class="text-muted font-weight-light"><i class="page-header-icon fa fa-user"></i>Usuarios / </span>
        Ver usuarios
      </h1>
    </div>
</div> 

<div class="panel">
  <div class="panel-body">
    <div class="table-danger">
    
        <br />
    
        <?php 
        	
			$sql = "SELECT cu.*, cr.rol FROM config_usuarios AS cu LEFT JOIN config_roles AS cr ON cu.id_rol = cr.id WHERE cu.id != 1";
			
            $usuarios = $oGlobals->verPorConsultaPor($sql, 1);
            if($usuarios != 2) include '../usuarios/tablas/tabla-usuarios.php';
            else 			  echo "<br>No se ha creado ningún módulo creado";
        
        ?>
        	<div id="load_modulo" class="modal fade" role="dialog"></div> 
      
    </div>
  </div>
</div>



    

 

