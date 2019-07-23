

    <div id="frm-campos" style="display:none";>
    
    	<div class="page-header">
            <div class="col-md-12 text-xs-center text-md-left">
              <h1><i class="page-header-icon fa fa-bar-chart"></i>INFORMES / Nuevo campo</h1>
            </div>
        </div> 
		
        <form id="frm-campo" name="frm-campo" class="form_sdv form-horizontal" method="post" action="../process/config/accion-campo.php">
                
                
                <input type="hidden" id="id_informe" name="id_informe" value="<?= $id;?>" />
                <input type="hidden" id="id" name="id"/>
                
                <div class="row">
                
                    <div class="col-md-6">
                        <label class="control-label">Nombre de campo</label>
                        <input type="text" id="nombre_campo" name="nombre_campo" class="form-control form-group-margin" />
                    </div>
                    
                    <div class="col-md-6">
                        <label class="control-label">Campo</label>
                        <input type="text" id="campo" name="campo" class="form-control form-group-margin" />
                    </div>
                    
                    <div class="col-md-6">
                        <label class="control-label">Tipo</label>
                        <select id="tipo" name="tipo" class="form-control form-group-margin">
                        	<option value="">Seleccione</option>
                            <?php $tipos = $oGlobals->verOpcionesPor("informes_campos_tipos", "", 1);
								  foreach($tipos as $tipo){
							?>
										<option value="<?= $tipo["tipo_dato"];?>"><?= $tipo["nombre"];?></option>
                            <?php }?>
                        </select>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="control-label">Consulta de botón</label>
                        <input type="text" id="boton_p" name="boton_p" class="form-control form-group-margin" />
                    </div>
                    
                </div>
				
                <br />
                	
                <div id="rsp-frm-campo"></div>
            
                <div class="text-center">
                
                	<button class="btn btn-danger" type="button" onClick="Funciones.toggle_divs('div-campos', 'frm-campos');" >Finalizar</button>
                    <button class="btn btn-danger" type="submit">Guardar</button>
                    
                </div>            
                
            </form>
        
    </div>
     
    <div id="div-campos">
    
    	<div class="page-header">
            <div class="col-md-12 text-xs-center text-md-left">
              <h1><i class="page-header-icon fa fa-bar-chart"></i>INFORMES / Campos</h1>
            </div>
        </div>

        <a class="btn btn-danger btn-outline" onClick="Funciones.toggle_divs('div-campos', 'frm-campos');" style="float: right;">
          <span class="btn-label-icon left fa fa-plus"></span>Nuevo campo
        </a>
        
        <br style="clear:both;" /><br style="clear:both;" />
        
        <div id="rsp-camp"></div>
    
        <div class="tabletable">
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Campo</th>
                    <th>Tipo</th>
                    <th style="text-align: center !important;">*</th>
                    <th>Opc</th>
                </tr>
            </thead>
            <tbody id="tr_body_campo">
                <?php 
                    if($campos != 2){
                        foreach($campos as $campo){
                            
                            $obl = "No";
                            if($campo["obligatorio"] == 1) $obl = "Si";
                ?>
                            <tr id="tr_cam_<?= $campo["id"];?>">
                                <td><?= utf8_encode($campo["nombre_campo"]);?></td>
                                <td><?= utf8_encode($campo["campo"]);?></td>
                                <td><?= utf8_encode($campo["tipo"]);?></td>
                                <td align="center"><?= $obl;?></td>
                                <td align="center">
                                    <i class="btn btn-default btn-xs fa fa-edit"  onClick="Funciones.cargar_formulario(<?= $campo["id"];?>, 'informes_campos', 'rsp-camp', 'div-campos', 'frm-campos');" title="Editar campo"></i>
                                    <i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $campo["id"];?>, 'informes_campos', 'rsp-camp');" title="Eliminar campo"></i>
                                </td>
                            </tr>
                <?php 
                        }
                    }
                ?>
            </tbody>
        </table>
        </div>
    
    </div>
