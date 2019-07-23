
<?php 
if(isset($id) && is_numeric($id)){
$sql1 = "SELECT m.documento as documento , c2.tipo as tipo, c1.nombre as nombre  FROM auto_evaluaciones_r 
          INNER JOIN competencias_2 as c2 ON c2.id = auto_evaluaciones_r.id_competencias_2
          INNER JOIN auto_evaluaciones as a ON a.id = auto_evaluaciones_r.id_autoevaluaciones
          INNER JOIN competencias_1 as c1 ON c1.id = a.id_competencias_1
          INNER JOIN mov as m ON m.documento = a.documento
          where auto_evaluaciones_r.id_autoevaluaciones='".$id."'";
$competencias_1 = $oGlobals->verPorConsultaPor($sql1, 0);
$tipo=$competencias_1["tipo"];
$nombre=$competencias_1["nombre"];
$documento=$competencias_1["documento"];

              if  ($tipo=='CON') { $tipo_detalle='Conocimientos Secundarios'; $tipo_volver='conocimientos'; }
              if  ($tipo=='HAB') { $tipo_detalle='Habiliadades Secundarios'; $tipo_volver='habilidades';}
              if  ($tipo=='ACT') { $tipo_detalle='Actitudes Secundarios'; $tipo_volver='actitudes';}
?>

<div class="page-header">
    <div class="col-md-4 text-xs-center text-md-left text-nowrap">
      <h1>
        <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-cubes"></i>Sub Competencias   / <b><?=utf8_encode($nombre);?>, Documento: [ <?=utf8_encode($documento);?> ] </b> </span>        
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
                where mov.documento='".$documento."'";
      
            $usuario = $oGlobals->verPorConsultaPor($usuarios, 0);
         ?>     
        <i class="page-header-icon fa fa-user"></i> Usuario a Evaluar / <span class="text-muted font-weight-light"><?=$usuario["nombre"];?></span>
        <hr>
    
        <?php 
        	
			$sql = "SELECT auto_evaluaciones_r.id as id, m.documento as documento , c2.tipo as tipo,  c2.nombre as nombre, auto_evaluaciones_r.valor_usuario_califica as valor, auto_evaluaciones_r.valor_usuario as valor_usuario, m.cerrado as cerrado FROM auto_evaluaciones_r 
              INNER JOIN competencias_2 as c2 ON c2.id = auto_evaluaciones_r.id_competencias_2
              INNER JOIN auto_evaluaciones as a ON a.id = auto_evaluaciones_r.id_autoevaluaciones
              INNER JOIN mov as m ON m.documento = a.documento              
              where auto_evaluaciones_r.id_autoevaluaciones='".$id."'";
			
            $objetivos = $oGlobals->verPorConsultaPor($sql, 1);
            if($objetivos != 2) include '../evaluaciones/tablas/tabla-competencias_2_califica.php';
            else 			  echo "<br>No hay datos para mostrar";
        
        ?>
        	<div id="load_modulo" class="modal fade" role="dialog"></div> 
      
    </div>
  </div>
</div>
<?php
}
?>



    

 

