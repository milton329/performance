
    <div class="modal-dialog">
    
				  <!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-header" style="padding:35px 50px; background-color:#53a953;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:#FFFFFF">Documento <?= utf8_encode($documento["documento"]);?></h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">	
        
        		<div id="resp_status"></div>
           
                <table class="table table-bordered table-hover">

                    <thead> 
                        <tr>
                            
                            <th scope="col" align="center" width="10%">Estado.</th>
                            <th scope="col" align="center" width="8%">Opc.</th>
                            <th scope="col" align="center" width="8%">Fecha.</th>
            
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php if($documento["tipo_documento"] != "asdfasdf"){?>
                        
                        <tr style="border-bottom:solid 1px #ccc;">
                            <td align="center">Cerrado</td>
                            <td align="center"><input class="btn_change_status_fact" id="cerrado_<?= $documento["id"];?>" type="checkbox" <?php if($documento["cerrado"] == 1) echo 'checked="checked"';?> /></td>
                            <td align="center"><?= ($documento["fecha_creacion"]);?></td>
                        </tr>
                        <?php } else {?>
                        
                        <tr style="border-bottom:solid 1px #ccc;">
                            <td align="center">Cerrado</td>
                            <td align="center"><input class="btn_change_status_fact" id="cotizacion_<?= $documento["id"];?>" type="checkbox" <?php if($documento["estado_cotizacion"] == 1) echo 'checked="checked"';?> /></td>
                            <td align="center"><?= ($documento["fecha_creacion"]);?></td>
                        </tr>
                        
                        <?php }?>     
            
                    </tbody>
    		</table>

        </div>
      
    </div>	
            
                