<div class="page-header">
    <div class="col-md-4 text-xs-center text-md-left text-nowrap">
      <h1>
        <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-book"></i>Evaluaciones / </span>
        Consultar Evaluaciones
      </h1>
    </div>
</div> 
<div class="panel">
 
        <div class="panel-body">
          <div class="table-danger">
            <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-users"></i>Listado de Evaluaciones </span>      
       <hr>    
    
          <!-- <form id="frm-consulta-evaluaciones" name="frm-consulta-evaluaciones" class="form_sdv form-horizontal" method="post" action="../process/documento/consultar-documentos.php">  

            <input type="hidden" name="tipo" id="tipo" value="1">
            
            <div class="col-md-2">
                <label class="control-label">Seleccione el Rol</label>
                <select class="form-control form-group-margin" id="id_rol" name="id_rol">
                                        <option value="">Seleccione</option>
                                            <?php 
                                                $rol = $oGlobals->verOpcionesPor("config_roles", "", 1);
                                                foreach($rol as $roles){
                                            ?>
                                                    <option value="<?= $roles["id"]?>"><?= utf8_encode($roles["rol"]);?></option>
                                            <?php 
                                                }
                                            ?>
                                        </select>
            </div> 
           
            <div class="col-md-3">
                <label class="control-label">Nombre del Usuario</label>
                <input class="form-control form-group-margin" type="text" id="text_cliente" name="text_cliente"/>
            </div> 

            <div class="col-md-2">
              <label class="control-label">Documento</label>
              <input type="text" id="documento" name="documento" class="form-control form-group-margin">
            </div>

            <div class="col-md-2">
              <label class="control-label">Fecha inicial</label>
              <input type="text" id="fecha_inicial" name="fecha_inicial" class="fechaIn form-control form-group-margin" readonly>
            </div>

            <div class="col-md-2">
              <label class="control-label">Fecha final</label>
              <input type="text" id="fecha_final" name="fecha_final" class="fechaIn form-control form-group-margin" readonly>
            </div>

            
            <div class="col-md-1">
              <button type="submit" style="border: none; background: #FFF; margin-top: 22px; font-size: 20px;"><i class="fa fa-play" aria-hidden="true"></i></button> 
            </div>

          </form> -->
          <div id="rsp-elidal"></div>

          <div id="rsp-frm-consulta-evaluaciones" class="tabletable">
                    
       <?php 
       $sql = "select mov.id as id , u.nombre as nombre, r.rol as rol, documento, fecha_documento, mov.fecha_modificacion, e.nombre as estados_mov, mov.cerrado from mov
                INNER JOIN config_usuarios as u ON u.id = mov.id_usuario
                INNER JOIN config_roles as r ON r.id = u.id_rol
                INNER JOIN estados_mov as e ON e.id = mov.cerrado
                where mov.cerrado>'0'
                order by  fecha_documento desc limit 30";
      
            $objetivos = $oGlobals->verPorConsultaPor($sql, 1);
      include 'tablas/tb-documentos-evaluaciones.php';
      ?>
   
                    </div> 
          </div>
      </div> 
    </div>
    
    
   <div id="load_modulo" class="modal fade" role="dialog"></div> 






    

 

