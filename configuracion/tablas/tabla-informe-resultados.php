

    <div id="frm-titulo" style="display:none";>
    
    	<div class="page-header">
            <div class="col-md-12 text-xs-center text-md-left">
              <h1><i class="page-header-icon fa fa-bar-chart"></i>INFORMES / Nuevo título</h1>
            </div>
        </div> 
		
        <form id="frm-titulo" name="frm-titulo" class="form_sdv form-horizontal" method="post" action="../process/config/accion-resultado.php">
                
                
                <input type="hidden" id="id_informe" name="id_informe" value="<?= $id;?>" />
                <input type="hidden" id="id" name="id"/>
                
                <div class="row">
                
                    <div class="col-md-6">
                        <label class="control-label">Título</label>
                        <input type="text" id="titulo_campo" name="titulo_campo" class="form-control form-group-margin" />
                    </div>
                    
                    <div class="col-md-6">
                        <label class="control-label">Posición</label>
                        <input type="number" id="posicion_campo" name="posicion_campo" class="form-control form-group-margin" />
                    </div>
                    
                    <div class="col-md-6">
                        <label class="control-label">Formato</label>
                        <select id="formato" name="formato" class="form-control form-group-margin">
                        	<option value="">Seleccione</option>
                            <?php $tipos = $oGlobals->verOpcionesPor("informes_titulos_tipos", "", 1);
								  foreach($tipos as $tipo){
							?>
										<option value="<?= $tipo["id"];?>"><?= utf8_encode($tipo["tipo_columna"]);?></option>
                            <?php }?>
                        </select>
                    </div>
                    
                    <div class="col-md-6">
                        <label class="control-label">Totalizar</label>
                        <select id="totaliza" name="totaliza" class="form-control form-group-margin">
                        	<option value="">Seleccione</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>

                        </select>
                    </div>
                   
                    
                </div>
				
                <br />
                	
                <div id="rsp-frm-titulo"></div>
            
                <div class="text-center">
                
                	<button class="btn btn-danger" type="button" onClick="Funciones.toggle_divs('div-titulo', 'frm-titulo');" >Finalizar</button>
                    <button class="btn btn-danger" type="submit">Guardar</button>
                    
                </div>            
                
            </form>
        
    </div>
     
    <div id="div-titulo">
    
    	<div class="page-header">
            <div class="col-md-12 text-xs-center text-md-left">
              <h1><i class="page-header-icon fa fa-bar-chart"></i>INFORMES / Títulos</h1>
            </div>
        </div>

        <a class="btn btn-danger btn-outline" onClick="Funciones.toggle_divs('div-titulo', 'frm-titulo');" style="float: right;">
          <span class="btn-label-icon left fa fa-plus"></span>Nuevo título
        </a>
        
        <br style="clear:both;" /><br style="clear:both;" />
        
        <div id="rsp-titu"></div>
    
        <div class="tabletable">
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Formato</th>
                    <th>Orden</th>
                    <th>Opc</th>
                </tr>
            </thead>
            <tbody id="tr_body_titulo">
                <?php 
                    if($titulos != 2){
                        foreach($titulos as $titulo){
                           
                ?>
                            <tr id="tr_titu_<?= $titulo["id"];?>">
                                <td><?= utf8_encode($titulo["titulo_campo"]);?></td>
                                <td><?= utf8_encode($titulo["formato"]);?></td>
                                <td><?= utf8_encode($titulo["posicion_campo"]);?></td>
                                <td align="center">
                                    <i class="btn btn-default btn-xs fa fa-edit"  onClick="Funciones.cargar_formulario(<?= $titulo["id"];?>, 'informes_titulos', 'rsp-titu', 'div-titulo', 'frm-titulo');" title="Editar título"></i>
                                    <i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $titulo["id"];?>, 'informes_titulos', 'rsp-titu');" title="Eliminar título" id="<?= $titulo["id"];?>"></i>
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
