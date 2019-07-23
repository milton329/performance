
<?php 

	$informe = $oGlobals->verOpcionesPor("informes", " AND id = $id", 0);
	if($informe != 2){
		
		$opcion = $oGlobals->verOpcionesPor("config_modulos_opciones", " AND id = ".$informe["id_modulo_opcion"]."", 0);
		$campos = $oGlobals->verOpcionesPor("informes_campos", " AND id_informe = $id", 1);
?>
        <div class="page-header">
            <div class="col-md-12 text-xs-center text-md-left ">
              <h1>
              	<span class="text-muted font-weight-light"><i class="page-header-icon fa fa-bar-chart"></i>Informes / <?= utf8_encode(($opcion["opcion_modulo"]));?> / </span>
				<?= utf8_encode($informe["nombre"]);?> 
              </h1>
            </div>
        </div> 
        
        <div class="panel">
          <div class="panel-body">
            <div class="table-danger">
            	
                <form id="frm-informe" name="frm-informe" class="form_sdv form-horizontal" method="post" action="../process/informes/informe.php">
					
                    	<input type="hidden" value="<?= $id;?>" id="id" name="id"/>
					
					<?php 
                        if($campos != 2){
                            foreach($campos as $campo){
                                
                                $clase     = ""; 
                                $condicion = "";
                                
                                if     ($campo["tipo"] == "datetime") {	$clase = "fechaIn"; $condicion = 'readonly="readonly"';}
                                else if($campo["tipo"] == "seleccion"){
                                    
                                    $select  = $oGlobals->llenarCombo($campo["boton_p"], $_SESSION['idUsuario']);
                                }
								
								$name = $campo["input_name"];
							                                
                                if($campo["tipo"] == "seleccion"){
									
									$variable = "";
									
									if($select != 2 ) {
										foreach($select as $tien){ $variable.= "'".$tien[0]."', "; }
									}
									
									if($informe["tipo_sql"] == 1) $variable = "todos";
									else						  $variable = "',".$variable."'";
                    ?>
                                    <div class="col-md-2">
                                        <label class="control-label"><?= utf8_encode($campo["nombre_campo"])?></label>
                                        <select id="<?= $name;?>" name="<?= $name;?>" class="form-control form-group-margin">
                                        	<option value="">Seleccione</option>
                                            <option value="<?= $variable;?>">Todos</option>
                                        <?php 
											if($select != 2){
												foreach($select as $sel){
										?>
                                        			<option value="<?= $sel[0];?>"><?= $sel[1];?></option>
                                        <?php
												}
											}
										?>
                                            
                                        </select>
                                    </div>
                    <?php	
                                } else {
                    ?>			
                                    <div class="col-md-2">
                                        <label class="control-label"><?= utf8_encode($campo["nombre_campo"])?></label>
                                        <input placeholder="dd/mm/aaaa" type="text" id="<?= $name;?>" name="<?= $name;?>" class="<?= $clase;?> form-control form-group-margin" <?= $condicion;?> />
                                    </div>
                    <?php				
                                }
                            }						
                        }
                    ?>
                        <div class="col-md-1">
                        	
                            <button type="submit" style="border: none; background: #FFF; margin-top: 22px; font-size: 20px;"><i class="fa fa-play" aria-hidden="true"></i></button> 
                        </div>
                </form>
                
                <br style="clear: both" />
                <br style="clear: both" />
                
                <div id="rsp-frm-informe" class="tabletable"></div>
              
            </div>
          </div>
        </div>
<?php 
	}
?>

    

 

