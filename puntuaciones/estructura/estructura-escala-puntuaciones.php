    
   <div class="modal-dialog" id="modal-default" style="display: block;">
    
      <div class="modal-content" >
        
        <div class="modal-header" style="background: #d74f3f; color:#FFFFFF; font-size:18px; text-align:center;">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4 class="modal-title" id="myModalLabel">Escalas de Puntuación</h4>
        </div>
        
        <div class="modal-body paddin" style=" background: #f6f6f6;">	
        		
               <div id="div-modulo-opcion">
               <?php             
               $sql = "SELECT * FROM puntuaciones";            
               $objetivos = $oGlobals->verPorConsultaPor($sql, 1);
               ?>
               <div class="table-responsive">
    <table class="table table-bordered table-hover" >
        <tbody id="tb_body">
            <?php foreach($objetivos as $objetivo){?>
                    <tr id="tr_user_<?= $objetivo["id"];?>">
                        <td><?= utf8_encode($objetivo["nombre"]);?></td>
                        <td style="width: 70%;"><?= utf8_encode($objetivo["detalle"]);?></td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
               		
                    
               </div>	
        </div>
      
    </div>	
            
                