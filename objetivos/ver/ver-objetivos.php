<div class="page-header">
    <div class="col-md-4 text-xs-center text-md-left text-nowrap">
      <h1>
      	<span class="text-muted font-weight-light"><i class="page-header-icon fa fa-cubes"></i>Objetivos / </span>
        Ver Objetivos
      </h1>
    </div>
</div> 

<div class="panel">
  <div class="panel-body">
    <div class="table-danger">

        <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura('0', 'objetivos', 'load_modulo', 0);" class="btn btn-danger btn-outline" data-toggle="modal" style="float: right;">
          <span class="btn-label-icon left fa fa-plus"></span>Nuevo Objetivo
        </a>
    
        <br /><br />
    
        <?php 
        	
			$sql = "SELECT * FROM objetivos";
			
            $objetivos = $oGlobals->verPorConsultaPor($sql, 1);
            if($objetivos != 2) include '../objetivos/tablas/tabla-objetivos.php';
            else 			  echo "<br>No se ha creado ningún módulo creado";
        
        ?>
        	<div id="load_modulo" class="modal fade" role="dialog"></div> 
      
    </div>
  </div>
</div>



    

 

