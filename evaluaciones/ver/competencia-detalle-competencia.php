
<?php 
if(isset($id) && is_numeric($id)){
$sql1 = "SELECT m.documento as documento , c2.tipo as tipo, c1.nombre as nombre  FROM auto_evaluaciones_r 
          INNER JOIN competencias_2 as c2 ON c2.id = auto_evaluaciones_r.id_competencias_2
          INNER JOIN auto_evaluaciones as a ON a.id = auto_evaluaciones_r.id_autoevaluaciones
          INNER JOIN competencias_1 as c1 ON c1.id = a.id_competencias_1
          INNER JOIN mov as m ON m.documento = a.documento
          where auto_evaluaciones_r.id_autoevaluaciones='".$id."' and m.cerrado>0 and m.id_usuario='".$_SESSION['idUsuario']."' limit 1";
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
    <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura('0', 'escala_puntuaciones', 'load_modulo', 0);" class="btn btn-danger btn-outline" data-toggle="modal" style="float: right;">
          <span class="btn-label-icon left fa fa-question"></span>Escala de Puntuación
        </a>
        <br /><br />    
        <?php 
        	
			$sql = "SELECT auto_evaluaciones_r.id as id, m.documento as documento , c2.tipo as tipo,  c2.nombre as nombre, auto_evaluaciones_r.valor_usuario as valor, m.cerrado as cerrado FROM auto_evaluaciones_r 
              INNER JOIN competencias_2 as c2 ON c2.id = auto_evaluaciones_r.id_competencias_2
              INNER JOIN auto_evaluaciones as a ON a.id = auto_evaluaciones_r.id_autoevaluaciones
              INNER JOIN mov as m ON m.documento = a.documento              
              where auto_evaluaciones_r.id_autoevaluaciones='".$id."' and m.cerrado>0 and m.id_usuario='".$_SESSION['idUsuario']."'";
			
            $objetivos = $oGlobals->verPorConsultaPor($sql, 1);
            if($objetivos != 2) include '../evaluaciones/tablas/tabla-competencias_2.php';
            else 			  echo "<br>No hay datos para mostrar";
        
        ?>
        	<div id="load_modulo" class="modal fade" role="dialog"></div> 
      
    </div>
  </div>
</div>
<?php
}
?>



    

 

