    
   <div class="modal-dialog " id="modal-default" style="display: block;">
    
      <div class="modal-content" >
        
        <div class="modal-header" style="background: #d74f3f; color:#FFFFFF; font-size:18px; text-align:center;">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title" id="myModalLabel">Objetivos</h4>
        </div>
        
        <div class="modal-body paddin" style=" background: #f6f6f6;">	
        		
               <div id="div-modulo-opcion">
               
               		<form action="../process/objetivos/accion-objetivos.php" id="frm-crear-objetivo" name="frm-crear-objetivo" method="post"  class="form_sdv form-horizontal"> 
						
                        <input type="hidden" name="id" id="id">
                        
						<div class="row">                            
							
                           
                                    <div class="col-md-4">
                                        <label class="control-label">Grupo</label>
                                        <select class="form-control form-group-margin" id="grupo" name="grupo">
                                            <option value="">Seleccione</option>
                                             <option value="Financiero">Financiero</option>
                                             <option value="Clientes">Clientes</option>
                                             <option value="Procesos">Procesos</option>
                                             <option value="Aprendizaje">Aprendizaje y Crecimiento</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-8">
                                        <label class="control-label">Nombre</label>
                                        <input class="form-control form-group-margin" type="text" id="nombre" name="nombre"/>
                                    </div>
                        </div>                        
                        <br />
                        
						<div id="rsp-frm-crear-objetivo"></div>
						<div class="panel-footer text-right" style="background: none !important;">
							<button class="btn btn-danger" type="button" onClick="location.href='../objetivos'">Volver</button>
							<button class="btn btn-danger" type="submit">Guardar cambios</button>
						</div>
						
					</form>
                    
               </div>	
        </div>
      
    </div>	
            
                