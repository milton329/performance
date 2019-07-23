
<div class="tabletable">
	
	<?php 
		$rawdata = array();
		$col     = 0;
		$cant    = 0;
		
		foreach($consulta as $colu){
		
			$rawdata[$col] = $colu; 
			$col++;	 
		}
		
		 for($p = 0; $p <= 50; $p++){
		  
			  set_time_limit(0);
			  $_SESSION["total_".$p] = 0;
			  $_SESSION["totaliza_".$p] = 0;
		  }
		
		$columnas = count($rawdata[0]) / 2;
		$filas    = count($rawdata);
		
    ?>

    <table class="table table-bordered">	
    	
        
        <?php if($titulos != 2){ ?>
    
    	<thead>
            <tr>
            	<?php 
					
					$tip = 0;
					foreach($titulos as $titulo){
				?>
                		<th><?= utf8_encode($titulo["titulo_campo"]);?></th>
                <?php 
						$_SESSION["totaliza".$tip] = $titulo["totaliza"];
						$tip ++;
					}
				?>
            </tr>
        </thead>
        
        <?php }?>
        
        <tbody id="tb_body">
            <?php 
			
				$align = "";
				$cantRegistros = 0; 
            
                for($i = 0; $i < $filas; $i++){
					
					set_time_limit(0);

			?>
            		<tr>
                    	<?php 							
							for($j = 0 ; $j < $columnas; $j++){ 
						
								if(is_numeric($rawdata[$i][$j]) && $excel == 2)      { $dato = number_format($rawdata[$i][$j], 0, "", "."); $align = "align = 'right';";}
								else if(is_numeric($rawdata[$i][$j]) && $excel == 1) { $dato = number_format($rawdata[$i][$j], 0, "", "");  $align = "align = 'right';";}
								else { $dato = ($rawdata[$i][$j]); $align = "align = 'center';";}	
								
								if(is_numeric($rawdata[$i][$j]))	$_SESSION["total_".$j] += $rawdata[$i][$j];
									
						?>
                        		<td <?= $align; ?> style="mso-number-format:'@';"><?= $dato; ?></td>
                    	<?php 
								
							}
						?>
                    </tr>
            <?php
					$cantRegistros++;				
				}
            ?>
            
            <?php 
				 if($titulos != 2){
    		?>
            		<tr>
            <?php
					$tot = 0;	
					foreach($titulos as $titulo){
							   
						set_time_limit(0);
			?>				   
						<td align = 'right'>
			<?php				   
						   if($titulo["totaliza"] == "1")  {
							   
							   if($excel == 2)	 echo "<b>".number_format($_SESSION["total_".$tot], 0, "", ".")."</b>";
							   else				 echo "<b>".round($_SESSION["total_".$tot])."</b>";		
						   }	
			?>
            			</td>
            <?php	
						$tot++;					
					}
			?>
            		</tr>
            <?php			   
				}	
			?>	
        </tbody>
    </table>
    
    Se han encontrado <strong><?= number_format($cantRegistros, 0, "", ".");?></strong> registros
      
</div>