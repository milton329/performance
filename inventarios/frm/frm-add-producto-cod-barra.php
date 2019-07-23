<!-- 
    Archivo que contiene la modal la cual registra los nuevos codigos de barras
    este archivo es llamado desde el archivo "carga-estructura.php en la linea 193"

 -->

 <script scr="../cods/js/developer/funciones.js"> </script>

    <div class="modal-dialog page-profile">
    
      <div class="modal-content" >
        
        <div class="modal-header bg-primary darker" style="text-align:center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:#FFFFFF">Agregar codigo de barras a <?= $referencia["nombre"];?></strong></h3>
        </div>
        
        <div class="modal-body paddin">	

            <div id="rspasdf"></div>
        
            <form id="frm-producto-ref" name="frm-producto-ref" class="form_sdv form-horizontal" method="post" action="../process/inventario/accion-referencia-cod-barras.php">
                        
                        <input type="hidden" id="codigo" name="codigo" class="form-control form-group-margin" value="<?= $referencia["codigo"];?>" /> 

                <div class="row">
                
                    <div class="col-md-6">
                        <label class="control-label">Codigo</label>
                        <input id="codigo" name="codigo" class="form-control form-group-margin" value="<?= $referencia["codigo"];?>" disabled/> 
                    </div><br>

                    <div class="col-md-6">
                        <label class="control-label">Tipo</label>
                        <select name="tipo" id="tipo" class="form-control form-group-margin" onchange="campos_textil()" required>
                        <option value="" selected="true" disabled="disabled">Seleccione...</option>
                            <option value="licores">Licores</option>
                            <option value="textil">Textil</option>
                            <option value="otros">Otros</option>
                        <select> 
                    </div><br>

                    <div id="textil">
                    </div>

                    <div class="col-md-6">
                        <label class="control-label">Barra</label>
                        <input id="barra" name="barra" class="form-control form-group-margin" required/> 
                    </div><br>

                    <div class="col-md-6">
                        <label class="control-label">Creado por</label>
                        <input id="creador_por" name="creador_por" class="form-control form-group-margin" required/> 
                    </div><br>
                    
                    <div class="col-md-6">
                        <label class="control-label">Id usuario creador</label>
                        <input id="id_usuario_creador" name="id_usuario_creador" class="form-control form-group-margin" required/> 
                    </div><br>

                    <div class="col-md-6">
                        <input id="fecha_modificado" type="hidden" name="fecha_modificado" value="yyyy/mm/dd" class="form-control form-group-margin" required/> 
                    </div><br>
                        
                    <div class="col-md-6">
                        <label class="control-label">Fecha de registro</label>
                        <input type="date" id="fecha_registro" name="fecha_registro" class="form-control form-group-margin" required/> 
                    </div><br>

                </div>
                
                <br />
                    
                <div id="rsp-frm-producto-ref"></div>
            
                <div class="text-center">
                    <button class="btn btn-primary" type="button">Volver</button>
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>            
                
            </form>

        </div>
      
    </div>

    
            
                