    
   <div class="modal-dialog " id="modal-default" style="display: block;">
    
      <div class="modal-content" >
        
        <div class="modal-header" style="background: #d74f3f; color:#FFFFFF; font-size:18px; text-align:center;">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title" id="myModalLabel">Editar Evaluación</h4>
        </div>
        
        <div class="modal-body paddin" style=" background: #f6f6f6;">	
        		
               <div id="div-modulo-opcion">
               
               <form action="../process/competencias/accion-evaluaciones.php" id="frm-crear-evaluaciones" name="frm-crear-evaluaciones" method="post"  class="form_sdv form-horizontal"> 
                        
                        <input type="hidden" name="id" id="id">                        
						<div class="row">                                                            
                                    <div class="col-md-12">
                                        <label class="control-label">Estado</label>
                                        <select class="form-control form-group-margin" id="cerrado" name="cerrado">
                                        <option value="">Seleccione</option>
                                            <?php 
                                                $rol = $oGlobals->verOpcionesPor("estados_mov", "", 1);
                                                foreach($rol as $roles){
                                            ?>
                                                    <option value="<?= $roles["id"]?>"><?= utf8_encode(strtoupper($roles["nombre"]));?></option>
                                            <?php 
                                                }
                                            ?>
                                        </select>
                                    </div>
                        </div>                        
                        <br />
                        
						<div id="rsp-frm-crear-evaluaciones"></div>
						<div class="panel-footer text-right" style="background: none !important;">
							<button class="btn btn-danger" type="button" onClick="location.href='../competencias/menu_consultar-evaluaciones.html'">Volver</button>
							<button class="btn btn-danger" type="submit">Guardar cambios</button>
						</div>
						
					</form>
                    
               </div>	
        </div>
      
    </div>	
            
                