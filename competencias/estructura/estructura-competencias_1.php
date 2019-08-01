    
   <div class="modal-dialog " id="modal-default" style="display: block;">
    
      <div class="modal-content" >
        
        <div class="modal-header" style="background: #d74f3f; color:#FFFFFF; font-size:18px; text-align:center;">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title" id="myModalLabel"><?= $tipo_detalle;?></h4>
        </div>
        
        <div class="modal-body paddin" style=" background: #f6f6f6;">	
        		
               <div id="div-modulo-opcion">
               
               		<form action="../process/competencias/accion-competencias_1.php" id="frm-crear-objetivos" name="frm-crear-objetivos" method="post"  class="form_sdv form-horizontal"> 
                        
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="tipo" id="tipo" value="<?=$tipo;?>">
                        <input type="hidden" name="rol"  id="rol" value="<?=$rol;?>">                        
						<div class="row">                                                              
                                    <div class="col-md-12">
                                        <label class="control-label">Nombre</label>
                                        <input class="form-control form-group-margin" type="text" id="nombre" name="nombre"/>
                                    </div>
                        </div>                        
                        <br />
                        
						<div id="rsp-frm-crear-objetivos"></div>
						<div class="panel-footer text-right" style="background: none !important;">
							<button class="btn btn-danger" type="button" onClick="location.href='../competencias'">Volver</button>
							<button class="btn btn-danger" type="submit">Guardar cambios</button>
						</div>
						
					</form>
                    
               </div>	
        </div>
      
    </div>	
            
                