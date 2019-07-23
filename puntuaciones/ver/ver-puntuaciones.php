<div class="page-header">
    <div class="col-md-4 text-xs-center text-md-left text-nowrap">
      <h1>
        <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-sitemap"></i>Escala de Puntaciones / </span>
        Ver Escala de Puntaciones
      </h1>
    </div>
</div> 

<div class="panel">
  <div class="panel-body">
    <div class="table-danger">        

        <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura('0', 'puntuaciones', 'load_modulo', 0);" class="btn btn-danger btn-outline" data-toggle="modal" style="float: right;">
          <span class="btn-label-icon left fa fa-plus"></span>Nueva Escala de Puntaciones
        </a>
    
        <br /><br />
    
        <?php 
        	
			$sql = "SELECT * FROM puntuaciones";
			
            $objetivos = $oGlobals->verPorConsultaPor($sql, 1);
            if($objetivos != 2) include '../puntuaciones/tablas/tabla-puntuaciones.php';
            else 			  echo "<br>No hay datos para mostrar";
        
        ?>
        	<div id="load_modulo" class="modal fade" role="dialog"></div> 
      
    </div>
  </div>
</div>



    

 

