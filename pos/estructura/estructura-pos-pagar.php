
<?php 
	$sql   = "SELECT SUM(sub_pedido) AS total FROM mov_r_pedidos WHERE documento = '".$_SESSION["ped_pos"]."'";
    $total = $oGlobals->verPorConsultaPor($sql, 0);                                                                                                                                                                                                                  
?>
<!-- Este script es para diferencias los miles en el input de dinero en efectivo -->
<script>

function reload(){
        
        location.href="vender-pos.html";
}
	

  $("#efectivo").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
            return value.replace(/\D/g, "")
                        .replace(/([0-9])([0-9]{3})$/, '$1.$2');
        });
    }
});

//
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
            // $('#efectivo').focus();
            $('#enviar').submit();
            break;
        }
    }
}

</script>
    
<div class="modal-dialog modal-lg" id="laModal">
  <div class="modal-content" >
  	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<center><h1 class="modal-title">PAGAR FACTURA DE VENTA : <?=$_SESSION["ped_pos"];?></h1></center>

			</div>
    <div class="modal-body">
    <center>
    <table>
    <tr>
    <td>
    Elija el monto recibido
    <br>
    <br>

    	<center>
                    <button type="button" id="1" class="btn btn-xl btn-success btn-outline btn-3d" style='background-color:#00b3ff; border-color:#0081ea' onClick="useButton(id);"><font color='white'>500</font></button>
					<button type="button" id="2" class="btn btn-xl btn-success btn-outline btn-3d" style='background-color:#00b3ff; border-color:#0081ea' onClick="useButton(id);"><font color='white'>1.000</font></button>
					<button type="button" id="3" class="btn btn-xl btn-success btn-outline btn-3d" style='background-color:#00b3ff; border-color:#0081ea' onClick="useButton(id);"><font color='white'>2.000</font></button>
					<button type="button" id="4" class="btn btn-xl btn-success btn-outline btn-3d" style='background-color:#00b3ff; border-color:#0081ea' onClick="useButton(id);"><font color='white'>5.000</font></button>
					<button type="button" id="5" class="btn btn-xl btn-success btn-outline btn-3d" style='background-color:#00b3ff; border-color:#0081ea' onClick="useButton(id);"><font color='white'>10.000</font></button>
					<button type="button" id="6" class="btn btn-xl btn-success btn-outline btn-3d" style='background-color:#00b3ff; border-color:#0081ea' onClick="useButton(id);"><font color='white'>20.000</font></button>
					<button type="button" id="7" class="btn btn-xl btn-success btn-outline btn-3d" style='background-color:#00b3ff; border-color:#0081ea' onClick="useButton(id);"><font color='white'>50.000</font></button>

  			
		  </center>


   <br>
   <form class="form_sdv" action="../process/documento/accion-recibido-cambio-total.php" method="post" id="frm-recibido-cambio-total">
   <div class="col-md-6">
   <label class="control-label">Tarjeta Debito</label>
   <input value="" id="td" name="td" type="text" class="form-control form-group-margin" value="">
   </div>
   <div class="col-md-6">
   <label class="control-label">Tarjeta Credito</label>
   <input value="" id="tc" name="tc" type="text" class="form-control form-group-margin" value="" >
   </div>
   <div class="col-md-6 efectivo">
   <label class="control-label">Efectivo (Digite el Valor Recibido en Pesos)</label>
   <input id="efectivo" name="efectivo" type="text" class="form-control form-group-margin" value="0" autofocus>
   </div>
   <button id="enviar" type="submit" class="btn btn-primary" style="visibility:hidden;"></button>
   <br>
   
     </td>
    </tr>
    <tr>
    <td>
    	<br>        
        <div id="rsp-frm-recibido-cambio-total">
       <?php
       include '../../pos/tablas/tb-recibido-cambio-total.php';
       ?> 
       </div> 
 
 <br><br>		

		       	
        </div>
    </div>	
</div>


            
                