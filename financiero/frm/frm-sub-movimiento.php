
    <form id="form-modulo-opcion" name="form-modulo-opcion" class="form_sdv form-horizontal" method="post" action="../process/finanzas/accion-sub-movimiento.php">
    
    <input type="hidden" id="id_movimiento" name="id_movimiento" value="<?= $id;?>" />
    <input type="hidden" id="id" name="id" />
    
    <div class="row">
    
        <div class="col-md-12">
            <label class="control-label">Sub movimiento</label>
            <input type="text" id="sub_movimiento" name="sub_movimiento" class="form-control form-group-margin" />
        </div>
        
    </div>
    
    <br />
        
    <div id="rsp-form-modulo-opcion"></div>

    <div class="text-center">
        <button class="btn btn-primary" type="button" onClick="Funciones.toggle_divs('div-modulo-opcion', 'frm-modulo-opcion');" >Finalizar</button>
        <button class="btn btn-primary" type="submit">Guardar</button>
    </div>            
    
</form>

            
                