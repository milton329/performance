    
    <div class="modal-dialog modal-lg">
    
      <div class="modal-content  " >
        
        <div class="modal-header bg-primary darker" style="text-align:center;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h3 style="color:#FFFFFF">Competidor <?= $competidor["competidor"];?></strong></h3>
        </div>
        
        <div class="modal-body paddin">	

              <ul class="nav nav-lg nav-tabs nav-tabs-simple nav-tabs-xs nav-justified" id="profile-tabs">    
                  <li class="active"><a href="#rsp-div-opc-asdf" onClick="Funciones.cargar_tab('<?= $id;?>', '18', 'rsp-div-opc-asdf');" data-toggle="tab" role="tab">Cotizaciones</a></li>
                  <li><a href="#rsp-div-opc-asdf" onClick="Funciones.cargar_tab('<?= $id;?>', '19', 'rsp-div-opc-asdf');" data-toggle="tab" role="tab">Productos</a></li>
              </ul>

              <div class="tab-content p-y-0">
                <div class="tab-content panel table-primary darker">
                  <div class="active panel-body tab-pane" id="rsp-div-opc-asdf" role="tabpanel">
                      <?php

                          $sql = "SELECT d.*, SUM(ddc.sub_total_adjudicado) as valor_total
                                FROM documentos AS d
                                LEFT JOIN documentos_detalle_cotizacion AS ddc ON d.documento = ddc.documento
                                WHERE d.tipo_documento = 'COT' AND d.adjudicada = 1 AND adjudicada_a = $id
                                GROUP BY d.documento
                                ORDER BY d.fecha_entrega ASC";
                    
                        $cotizaciones = $oGlobals->verPorConsultaPor($sql, 1);
                        include '../../dashboard/tablas/tb-adjudicadas.php'; 
                      ?>   
                  </div>
                </div>
              </div>
                
                
        </div>
      
    </div>	
            
                