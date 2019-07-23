	
     
    <div class="modal-dialog page-profile">
    
      <div class="modal-content" >
        
        <div class="modal-header bg-danger" style="text-align:center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:#FFFFFF">Configuracion de Cajas</strong></h3>
        </div>
        
        <div class="modal-body paddin" style=" background: #f6f6f6;">	
        
            <form id="frm-cajas" name="frm-cajas" class="form_sdv form-horizontal" method="post" action="../process/almacenes/accion-cajas.php">
                
                <input type="hidden" id="id" name="id" />
                
                <div class="row">
                
                    <div class="col-md-3">
                        <label class="control-label">Almacen</label>
                        <select class="form-control form-group-margin" id="alm_codigo" name="alm_codigo">
                                    <option value="">Seleccione</option>
                                    <?php 
                                        $almacenes = $oGlobals->verOpcionesPor("almacenes", "".$con_emp, 1);
                                        foreach ($almacenes as $almacen) {
                                    ?>
                                            <option value="<?= $almacen["codigo"];?>"><?= utf8_encode($almacen["nombre"]);?></option>
                                    <?php
                                        }
                                    ?>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="control-label">Codigo</label>
                        <input type="text" id="codigo" name="codigo" class="form-control form-group-margin" required>
                    </div>

                    <div class="col-md-3">
                        <label class="control-label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control form-group-margin" required>
                    </div>

                    <div class="col-md-3">
                        <label class="control-label">Base</label>
                        <input type="text" id="base" name="base" class="form-control form-group-margin" required>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="control-label">Numero de Resolucion</label>
                        <input type="text" id="alm_resolucion" name="alm_resolucion" class="form-control form-group-margin" />
                    </div>
                    <div class="col-md-6">
                        <label class="control-label">Fecha de Resolucion</label>
                        <input readonly="" class="fechaIn form-control form-group-margin" type="text" id="alm_fec_res" name="alm_fec_res">
                    </div>

                    <div class="col-md-3">
                        <label class="control-label">Prefijo</label>
                        <input type="text" id="alm_prefijo" name="alm_prefijo" class="form-control form-group-margin" />
                    </div>

                    <div class="col-md-3">
                        <label class="control-label">Cons Inicial</label>
                        <input type="text" id="alm_con_ini" name="alm_con_ini" class="form-control form-group-margin" />
                    </div>

                    <div class="col-md-3">
                        <label class="control-label">Cons Final</label>
                        <input type="text" id="alm_con_fin" name="alm_con_fin" class="form-control form-group-margin" />
                    </div>

                    <div class="col-md-3">
                        <label class="control-label">Cons Actual</label>
                        <input type="text" id="num_cua" name="num_cua" class="form-control form-group-margin" />
                    </div>

                    

                </div>
				
                
                <br />
                	
                <div id="rsp-frm-cajas"></div>
            
                <div class="text-center">
                    <button class="btn btn-danger" type="submit">Guardar</button>
                </div>            
                
            </form>

        </div>
      
    </div>	
    
    </div>        
                