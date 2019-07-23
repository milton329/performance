<?php $tipo='ACT';
              if  ($tipo=='CON') { $tipo_detalle='Conocimientos Principales'; }
              if  ($tipo=='HAB') { $tipo_detalle='Habiliadades Principales'; }
              if  ($tipo=='ACT') { $tipo_detalle='Actitudes Principales'; }
?>

<div class="page-header">
    <div class="col-md-4 text-xs-center text-md-left text-nowrap">
      <h1>
        <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-cubes"></i>Competencias Principales / </span>
        Ver <?= $tipo_detalle;?>
      </h1>
    </div>
</div> 

<div class="panel">
  <div class="panel-body">
    <div class="table-danger">        

        <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura('0_<?= $tipo;?>_0', 'competencias_1', 'load_modulo', 0);" class="btn btn-danger btn-outline" data-toggle="modal" style="float: right;">
          <span class="btn-label-icon left fa fa-plus"></span>Nuevo <?= $tipo_detalle;?>
        </a>
    
        <br /><br />
    
        <?php 
        	
			$sql = "SELECT * FROM competencias_1 where tipo='".$tipo."'";
			
            $objetivos = $oGlobals->verPorConsultaPor($sql, 1);
            if($objetivos != 2) include '../competencias/tablas/tabla-competencias_1.php';
            else 			  echo "<br>No hay datos para mostrar";
        
        ?>
        	<div id="load_modulo" class="modal fade" role="dialog"></div> 
      
    </div>
  </div>
</div>



    

 

