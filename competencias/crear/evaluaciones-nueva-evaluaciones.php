<div class="page-header">
    <div class="col-md-4 text-xs-center text-md-left text-nowrap">
      <h1>
        <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-book"></i>Evaluaciones / </span>
        Crear Evaluaciones
      </h1>
    </div>
</div> 
<div class="panel">
  <div class="panel-body">
    <div class="table-danger">        
       <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-users"></i>Crear Evaluaciones para un Rol </span>      
       <hr>    
        <form action="../process/documento/accion-documento.php" id="frm-factura" name="frm-factura" method="post"  class="form_sdv form-horizontal" enctype="multipart/form-data">
         <div class="col-md-4">
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
        <div class="col-md-1">
              <label class="control-label">&nbsp;&nbsp;&nbsp;</label>
              <button class="btn btn-danger" type="submit"><i class="fa fa-cogs"></i> Generar</button>
        </div>            
        </form>
        <div id="rsp-frm-factura"></div>     
         
        <br><br><br>
    </div>
  </div>
</div>
<div class="panel">
  <div class="panel-body">
    <div class="table-danger">        
     <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-user"></i>Crear Evaluaciones para un Usuario </span>
     <hr>   
        <form action="../process/autoevaluaciones/accion-autoevaluaciones.php" id="frm-autoevaluaciones_usuario" name="frm-autoevaluaciones_usuario" method="post"  class="form_sdv form-horizontal" enctype="multipart/form-data">
         <div class="col-md-4">
                <label class="control-label">Nombre del Usuario</label>
                <input class="form-control form-group-margin" type="text" id="text_cliente" name="text_cliente"/>
        </div>                  
        <div class="col-md-1">
              <label class="control-label">&nbsp;&nbsp;&nbsp;</label>
               <button class="btn btn-danger" type="submit"><i class="fa fa-cogs"></i> Generar</button>
        </div>            
        </form>
            
         
        <br><br><br>
    </div><div id="rsp-frm-autoevaluaciones_usuario"></div>
  </div>
</div>





    

 

