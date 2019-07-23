
<div class="modal-dialog modal-lg" style=" width: 1200px !important;">
    
  <div class="modal-content" >
    
    <div class="modal-header" style=" background-color:#d74f3f; text-align:center;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h3 style="color:#FFFFFF"> Análisis de venta por meses / Tienda: <?= $tienda;?></strong></h3>
    </div>
    
    <div class="modal-body paddin" style=" background: #f6f6f6;">	
    
		<div id="load-nivel-2" class="tabletable">
            <?php include '../../informes/tablas/tabla-informe-analisis-ventas-niveles.php';?>
        </div>
        
        <div id="load-nivel-3" style=" display: none"></div> 

    </div>
  
</div>        
        
        
        