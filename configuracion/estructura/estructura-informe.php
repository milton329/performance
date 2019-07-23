    
    <div class="modal-dialog modal-lg">
    
      <div class="modal-content" >
        
        <div class="modal-header" style=" background-color:#d74f3f; text-align:center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 style="color:#FFFFFF">INFORME / <?= utf8_encode($informe["nombre"]);?></strong></h3>
        </div>
        
        <div class="modal-body paddin" style=" background: #f6f6f6;">	
        
            <ul class="nav nav-tabs nav-tabs-simple nav-lg nav-justified">
                <li class="active"><a href="" onClick="Funciones.cargar_tab('<?= $id;?>', 'informe_campos', 'rsp-div-opc');" data-toggle="tab"  role="tab">Campos</a></li>
                <li><a href="" onClick="Funciones.cargar_tab('<?= $id;?>', 'informe_resultado', 'rsp-div-opc');" data-toggle="tab" role="tab">Resultados</a></li>
            </ul>
            
            <div class="tab-content panel table-danger">
              <div class="panel-body tab-pane active" id="rsp-div-opc" role="tabpanel">
                    <?php include '../../configuracion/tablas/tabla-informe-campos.php'?>     
              </div>
            </div>
	
        </div>
      
    </div>	
            
                