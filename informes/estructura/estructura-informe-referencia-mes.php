
<div class="modal-dialog modal-lg lg-modal-mov">
    
  <div class="modal-content" >
    
    <div class="modal-header" style=" background-color:#d74f3f; text-align:center;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h3 style="color:#FFFFFF"> Inventario de <?= $referencia;?> de Tienda <?= $tienda;?></strong></h3>
    </div>
    
    <div class="modal-body paddin" style=" background: #f6f6f6;">
    
    	<?php 
			
			$sql_ = "SELECT ARTICULOS.CODARTICULO, STOCKS.TALLA, STOCKS.COLOR, STOCKS.STOCK
					 FROM STOCKS INNER JOIN ARTICULOS ON STOCKS.CODARTICULO = ARTICULOS.CODARTICULO
					 WHERE (ARTICULOS.REFPROVEEDOR = '$referencia') AND (STOCKS.CODALMACEN = '$tienda')";
			$inventarios = $oGlobals->ejecutarConsultarPor("sqlsrv:Server", "PRINCIPAL", "TEMPLO_INV", "sa", 'Pa$$w0rd', $sql_, 1);
		
		?>	
    
		<div id="load-nivel-2" class="tabletable">
            <?php include '../../informes/tablas/tabla-informe-analisis-referencia-mes.php';?>
        </div>
        
        <div id="load-nivel-3" style=" display: none"></div> 

    </div>
  
</div>        
        
        
        