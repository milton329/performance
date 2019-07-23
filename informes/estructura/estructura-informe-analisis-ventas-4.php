    


        <div class="page-header">
            <div class="col-md-4 text-xs-center text-md-left text-nowrap">
              <h1>
                <span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-pulse-strong"></i>Informes / </span>
                Análisis por <?= utf8_encode($subfami);?> de <?= utf8_encode($tienda);?>
              </h1>
            </div>
        </div>
        
        <div class="modal-body paddin" style=" background: #f6f6f6;">	
        		
               <div id="nivel-3"> 
               		<?php include '../../informes/tablas/tabla-informe-analisis-ventas-nivel-4.php';?>
               </div>	
               
               <div id="load-nivel-4" style="display: none"></div>
               
        </div>
      

                