    
   <div class="modal-dialog " id="modal-default" style="display: block;">
    
      <div class="modal-content" >
        
        <div class="modal-header" style="background: #d74f3f; color:#FFFFFF; font-size:18px; text-align:center;">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title" id="myModalLabel"><?= $tipo_detalle;?></h4>
        </div>
        
        <div class="modal-body paddin" style=" background: #f6f6f6;">	
        		
               <div id="div-modulo-opcion">
               
               		<form action="../process/competencias/accion-competencias_2.php" id="frm-crear-objetivo" name="frm-crear-objetivo" method="post"  class="form_sdv form-horizontal"> 
                        
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="tipo" id="tipo" value="<?=$tipo;?>">
                        <input type="hidden" name="id_competencias_1" id="id_competencias_1" value="<?=$id_competencias_1;?>">
                        
						<div class="row">                                                              
                                    <div class="col-md-12">
                                        <label class="control-label">Nombre</label>
                                        <input class="form-control form-group-margin" type="text" id="nombre" name="nombre"/>
                                    </div>
                        </div>
                        <div class="row">                                                              
                                    <div class="col-md-12">
                                        <label class="control-label">Valor</label>
                                        <input type='number' class="form-control form-group-margin" type="text" id="valor" name="valor"/>
                                    </div>
                        </div>                         
                        <br />
                        
						<div id="rsp-frm-crear-objetivo"></div>
						<div class="panel-footer text-right" style="background: none !important;">
							<button class="btn btn-danger" type="button" onClick="location.href='../evaluaciones'">Volver</button>
							<button class="btn btn-danger" type="submit">Guardar cambios</button>
						</div>
						
					</form>
                    
               </div>	
        </div>
      
    </div>	
            
                