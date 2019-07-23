
        <div class="page-header">
	        <div class="col-md-4 text-xs-center text-md-left text-nowrap">
	          <h1>
	            <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-shopping-basket"></i>POS / Ventas /</span>
	            Consultar ventas POS
	          </h1>
	        </div>
	    </div>

		
		<div class="panel">
 
			  <div class="panel-body">
    			<div class="table-primary">
		
					<form id="frm-listas" name="frm-listas" class="form_sdv form-horizontal" method="post" action="../process/documento/consultar-documentos.php">	

						<input type="hidden" name="tipo" id="tipo" value="2">
						<input type="hidden" id="tipo_documento" name="tipo_documento" value="RPS" />
						<input type="hidden" id="text_cliente" name="cliente" class="form-control form-group-margin" />

            
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

						<div class="col-md-1">
							<button type="submit" style="border: none; background: #FFF; margin-top: 22px; font-size: 20px;"><i class="fa fa-play" aria-hidden="true"></i></button> 
						</div>

					</form>
    	
					<br style="clear: both" />
					<br style="clear: both" />

					<div id="rsp-elidal"></div>

					<div id="rsp-frm-listas" class="table-responsive">
						<?php 

							$con_doc       = " AND M.tipo_documento IN ('RPS') AND M.fecha_documento >= '".date("Y-m-d")."' AND M.fecha_documento <= '".date("Y-m-d")."'";
							$con_doc_order = " ORDER BY M.fecha_documento DESC, M.documento DESC";

							$usuarios="SELECT * FROM config_usuarios
                    		where usuario='".$_SESSION["usuario"]."'";
                    		$usuario = $oGlobals->verPorConsultaPor($usuarios, 0);
                    		$cajero= $usuario['usuario'];                   

							$sql = "select * from mov where cajero='".$cajero."'";

							$documentos = $oGlobals->verPorConsultaPor($sql, 1);

							$enlace = "menu_detalle-factura_";

							if($documentos != 2)	include '../pos/tablas/tb-documentos.php';
							else echo "<div class='error'>No se ha encontrado ninguna venta hoy</div>";
						?>
					</div>
				  </div>
			</div> 
		</div>
    
    
    <div id="load_planilla" class="modal fade" role="dialog"></div>