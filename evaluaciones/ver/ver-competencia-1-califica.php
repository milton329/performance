<?php 
$tipo=substr($id, 0, 3);
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
         <?php
         //consultar el usuario a evaluar
         $usuarios = "select mov.id as id , u.nombre as nombre, documento, fecha_documento, mov.fecha_modificacion  from mov
                INNER JOIN config_usuarios as u ON u.id = mov.id_usuario
                where mov.documento='".$id."'";
      
            $usuario = $oGlobals->verPorConsultaPor($usuarios, 0);
         ?>     
        <i class="page-header-icon fa fa-user"></i> Usuario a Evaluar / <span class="text-muted font-weight-light"><?=$usuario["nombre"];?></span>
        <hr>
             
        <?php 
        	
			$sql = "SELECT  auto_evaluaciones.id as id_auto_evaluaciones, m.documento as documento, c1.nombre as nombre, c1.tipo as tipo,
        (select count(*) from auto_evaluaciones_r where id_autoevaluaciones=auto_evaluaciones.id) as total,
        (select count(*) from auto_evaluaciones_r where id_autoevaluaciones=auto_evaluaciones.id and valor_usuario_califica>'0.0') as completado FROM auto_evaluaciones 
              INNER JOIN mov as m ON m.documento = auto_evaluaciones.documento
              INNER JOIN competencias_1 as c1 ON c1.id = auto_evaluaciones.id_competencias_1
              where m.documento='".$id."'";
			
            $objetivos = $oGlobals->verPorConsultaPor($sql, 1);
            if($objetivos != 2) include '../evaluaciones/tablas/tabla-competencias_1_califica.php';
            else 			  echo "<br>No hay datos para mostrar";
        
        ?>
        	<div id="load_modulo" class="modal fade" role="dialog"></div> 
      
    </div>
  </div>
</div>



    

 

