
    <form id="form-modulo-opcion" name="form-modulo-opcion" class="form_sdv form-horizontal" method="post" action="../process/config/accion-modulo-opcion.php">
    
    <input type="hidden" id="id_modulo" name="id_modulo" value="<?= $id;?>" />
    <input type="hidden" id="id" name="id" />
    
    <div class="row">
    
        <div class="col-md-12">
            <label class="control-label">Nombre opción</label>
            <input type="text" id="opcion_modulo" name="opcion_modulo" class="form-control form-group-margin" />
        </div>
        
        <div class="col-md-4">
            <label class="control-label">Directorio</label>
            <input type="text" id="directorio" name="directorio" class="form-control form-group-margin" />
        </div>
        
        <div class="col-md-4">
            <label class="control-label">Enlace</label>
            <input type="text" id="enlace" name="enlace" class="form-control form-group-margin" />
        </div>
        
        <div class="col-md-4">
            <label class="control-label">Archivo</label>
            <input type="text" id="archivo" name="archivo" class="form-control form-group-margin" />
        </div>
        
        <div class="col-md-4">
            <label class="control-label">Icono</label>
            <input type="text" id="icono" name="icono" class="form-control form-group-margin" />
        </div>
        
        <div class="col-md-4">
            <label class="control-label">Mostrar en menú</label>
            <select id="mostrar_menu" name="mostrar_menu" class="form-control form-group-margin" >
            	<option value="">Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
            </select>
            
        </div>
        
        <div class="col-md-4">
            <label class="control-label">Mostrar en tab</label>
            <input type="text" id="mostrar_" name="mostrar_" class="form-control form-group-margin" />
        </div>
             
    </div>
    
    <br />
        
    <div id="rsp-form-modulo-opcion"></div>

    <div class="text-center">
        <button class="btn btn-danger" type="button" onClick="Funciones.toggle_divs('div-modulo-opcion', 'frm-modulo-opcion');" >Finalizar</button>
        <button class="btn btn-danger" type="submit">Guardar</button>
    </div>            
    
</form>

            
                