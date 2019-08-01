<?php $tipo='CON';
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
    

    
    <br style="clear: both;"/>
    
    <ul class="nav nav-lg nav-tabs nav-tabs-simple" id="profile-tabs">        
        <li><a href="" >Roles </a></li>
        <!-- <li ><a href="" id="tr_user_2">Conocimientos Principales</a></li>
        <li><a href="#rsp-div-opc-asdf" onClick="Funciones.cargar_tab('<?= $id;?>', 'referencia_precios', 'rsp-div-opc-asdf');" data-toggle="tab" role="tab">Conocimientos Secundarios</a></li> -->
    </ul>

    <div class="tab-content p-y-0">
      <div class="tab-content panel table-danger">
        <div class="active panel-body tab-pane" id="rsp-div-opc-asdf" role="tabpanel">
           
        <div class="table-danger"> 
        <?php           
        $sql = "SELECT config_roles.rol as rol, 
                    (select count(*) from config_usuarios where id_rol=config_roles.id) as 
                    usuarios,
                    (select count(*) from competencias_1 where id_rol=config_roles.id and tipo='CON') as 
                    competencias_1
                    FROM config_roles where config_roles.rol not in('Administrador','Administrador principal') 
                ";      
            $objetivos = $oGlobals->verPorConsultaPor($sql, 1);
            if($objetivos != 2) include '../competencias/tablas/tabla-roles.php';
            else        echo "<br>No hay datos para mostrar";        
        ?>
        
        
        </div>
        <div id="load_modulo" class="modal fade" role="dialog"></div>
      </div>
    </div>
  </div>

  <div id="load_modulo" class="modal fade" role="dialog"></div></div>

</div>

</div>


    

 

