
        <div class="page-header">
            <div class="col-md-12 text-xs-center text-md-left ">
              <h1>
                <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-cubes"></i>Documentos / Facturación /</span>
                Consultar facturas
              </h1>
            </div>
        </div>

		
		<div class="panel">
 
			  <div class="panel-body">
    			<div class="table-primary">
		
					<form id="frm-listas" name="frm-listas" class="form_sdv form-horizontal" method="post" action="../process/documento/consultar-documentos.php">	

						<input type="hidden" name="tipo" id="tipo" value="2">
						<input type="hidden" id="tipo_documento" name="tipo_documento" value="REM" />

						<div class="col-md-3">
			                <label class="control-label">Cliente</label>
			                <input id="text_cliente" name="cliente" class="form-control form-group-margin" />
			            </div>
            
						<div class="col-md-2">
							<label class="control-label">Documento</label>
							<input type="text" id="documento" name="documento" class="form-control form-group-margin">
						</div>

						<div class="col-md-2">
							<label class="control-label">Fecha inicial</label>
							<input type="text" id="fecha_inicial" name="fecha_inicial" class="fechaIn form-control form-group-margin" readonly>
						</div>

						<div class="col-md-2">
							<label class="control-label">Fecha final</label>
							<input type="text" id="fecha_final" name="fecha_final" class="fechaIn form-control form-group-margin" readonly>
						</div>

						<?php if($_SESSION["tipo_rol"] == 1){?>
							<div class="col-md-2">
		                        <label class="control-label">Empresa</label>
		                        <select class="form-control form-group-margin" id="id_empresa" name="id_empresa">
		                            <option value="">Seleccione</option>
		                            <?php 
		                                $empresas = $oGlobals->verOpcionesPor("empresas", $con_empresa, 1);
		                                foreach ($empresas as $empresa) {
		                            ?>
		                                    <option value="<?= $empresa["id"];?>"><?= $empresa["nombre_empresa"];?></option>
		                            <?php
		                                }
		                            ?>
		                        </select>
		                    </div>
		                <?php }?>

						<div class="col-md-1">
							<button type="submit" style="border: none; background: #FFF; margin-top: 22px; font-size: 20px;"><i class="fa fa-play" aria-hidden="true"></i></button> 
						</div>

					</form>
    	
					<br style="clear: both" />
					<br style="clear: both" />

					<div id="rsp-elidal"></div>

					<div id="rsp-frm-listas" class="table-responsive">
						<?php 

							$con_doc       = " AND M.tipo_documento IN ('REM') AND M.fecha_documento >= '".date("Y-m-d")."' AND M.fecha_documento <= '".date("Y-m-d")."'";
							$con_doc_order = " ORDER BY M.fecha_documento DESC, M.documento DESC";

							$sql = "SELECT M.*, SUM(MR.sub_total) AS total, SUM(MR.salida) AS t_cantidad
									FROM mov AS M LEFT JOIN mov_r AS MR ON M.documento = MR.documento
									WHERE 1=1 $con_doc
									GROUP BY M.documento
									$con_doc_order";

							$documentos = $oGlobals->verPorConsultaPor($sql, 1);

							$enlace = "menu_detalle-factura_";

							if($documentos != 2)	include '../documentos/tablas/tb-documentos.php';
							else echo "<div class='error'>No se ha encontrado ninguna remisión hoy</div>";
						?>
					</div>
				  </div>
			</div> 
		</div>
    
    
    <div id="load_planilla" class="modal fade" role="dialog"></div>