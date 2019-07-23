<script>

function useButton(i){
    var subtotal = document.getElementById('efectivo').value;
    subtotal = subtotal.replace(".","");
    parseInt(subtotal);
    var total = 0;
    var ids = ['1','2','3','4','5','6','7'];
    var val = ['500','1000','2000','5000','10000','20000','50000'];
    
    for(var c = 0; c<7; c++){
        if(i == ids[c]){
            total = parseInt(subtotal) + parseInt(val[c]);
            $('#efectivo').val(total);
            $('#efectivo').focus();
            $('#enviar').submit();
            break;
        }
    }
}

function reload(){
    location.href="vender-pos.html";
}
</script>

<?php
session_start();
		
	if($_POST["efectivo"] != ""){	
        
	

		require_once('../../class/classGlobal.php');
	
		$oGlobals = new Globals();
		
		$sql   = "SELECT SUM(sub_pedido) AS total FROM mov_r_pedidos WHERE documento = '".$_SESSION["ped_pos"]."'";
	    $total = $oGlobals->verPorConsultaPor($sql, 0);

          $recibido=$_POST["efectivo"];
          $recibido = str_replace(".","",$recibido);
          $cambio=$recibido-$total["total"];

	    ?>

<center>
        <table style="width:98%;">
                        <tr>
                            <td style="background-color:#D8D8D8;">
                                  <center><div class="pull-xs-center m-y-1 font-size-16 text-muted"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RECIBIDO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div></center>
                            </td>
                            <td style="background-color:#00b3ff;">
                                  <center><div class="pull-xs-center m-y-1 font-size-16 text-muted"><strong><font color='white'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CAMBIO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></strong></div></center>
                            </td>
                            <td style="background-color:#D8D8D8;">
                                  <center><div class="pull-xs-center m-y-1 font-size-16 text-muted"><strong>TOTAL A PAGAR</strong></div></center>
                            </td>
                        </tr>
                        <tr>
                            <td style="background-color:#D8D8D8;">
                                  <center><div class="pull-xs-center font-size-24"><strong id="fact">$ <?= number_format($recibido, 0, "", ".");?></strong></div></center>
                            </td>
                            <td style="background-color:#00b3ff;">
                                  <center><div class="pull-xs-center font-size-24"><strong id="fact"><font color='white'>$ <?= number_format($cambio, 0, "", ".");?></font></strong></div></center>
                            </td>
                            <td style="background-color:#D8D8D8;">
                                  <center><div class="pull-xs-center font-size-24"><strong id="fact">$ <?= number_format($total["total"], 0, "", ".");?></strong></div></center>
                            </td>
                         </tr>
                        </table></center>
 
<?php

if ($cambio<-1)
{
?>
<br>
    <br>
    <br>
    <center>
            <button type="button" class="btn btn-xl btn-danger btn-3d" data-dismiss="modal" onclick="reload();">CANCELAR</button>
            <!--<button onclick="Funciones.cerrar_documento('finalizar_factura_pos', 'documento', '1', 'rspsfaede');" type="button" class="btn btn-xl btn-success btn-3d">&nbsp;&nbsp;&nbsp;&nbsp;PAGAR&nbsp;&nbsp;&nbsp;&nbsp;</button>-->
   </center>
   <div id="rspsfaede"></div>
<?php
}
if($cambio>=0)
{
?>
<br>
    <br>
    <br>
    <center>
            <button type="button" class="btn btn-xl btn-danger btn-3d" data-dismiss="modal" onclick="reload();">CANCELAR</button>
            <button onclick="Funciones.cerrar_documento('finalizar_factura_pos', 'documento', '1', 'rspsfaede');" type="button" class="btn btn-xl btn-success btn-3d">&nbsp;&nbsp;&nbsp;&nbsp;PAGAR&nbsp;&nbsp;&nbsp;&nbsp;</button>
   </center>
   <div id="rspsfaede"></div>
<?php
}
}
?>
