<div style="display:none;">
<?php  
    $empresa = $oGlobals->verOpcionesPor("empresas", "", 0);
    $nombre_empresa=$empresa[nombre_empresa];
    $codigo=$empresa[codigo];
    $descripcion=$empresa[descripcion];
    $celular=$empresa[celular];
    $nombre_caja = $empresa[nombre];
  

    $factura = $oGlobals->verOpcionesPor("mov_pedido", " AND id = $id", 0);
    $documento=$factura[documento];
    $fecha_registro=$factura[fecha_registro];
    $cliente_identificacion=$factura[cliente_identificacion];
    if($cliente_identificacion==""){$cliente_identificacion='N/A';};
    $cliente_nombre=$factura[cliente_nombre];
    if($cliente_nombre==""){$cliente_nombre='CLIENTE CONTADO';};


?>
<div>
<html>
<head>
<style>
<script>
</style>
</head>
<body>
<script type="text/javascript">
function imprSelec(muestra)
{var ficha=document.getElementById(muestra);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);ventimp.document.close();ventimp.print();ventimp.close();
}
</script>
<body onload="imprSelec('muestra');"> 
<div id="muestra"> 
<center>
<table style="width: 100%">
<tr><td><center><?=$nombre_empresa;?></center></td></tr>
<tr><td><center><?=$descripcion;?></center></td></tr>
<tr><td><center>NIT : <?=$codigo;?></center></td></tr>
<tr><td><center>TEL : <?=$celular;?></center></td></tr>
<tr><td><center>DIR : CLL 5# 14-30</center></td></tr>
<tr><td><center>&nbsp;&nbsp;&nbsp;</center></td></tr>
<tr><td><center>CAJA : <?=$nombre_caja;?></center></td></tr>
<tr><td><center>&nbsp;&nbsp;&nbsp;</center></td></tr>
<tr><td>Factura No:     <?=$documento;?></td></tr>
<tr><td>Fecha:          <?=$fecha_registro;?></td></tr>
<tr><td>Nit/CC:         <?=$cliente_identificacion;?></td></tr>
<tr><td>Nombre Cliente: <?=$cliente_nombre;?></td></tr>
<tr><td>Dir: CLL 5# 14-30</td></tr>
<tr><td><center>&nbsp;&nbsp;&nbsp;</center></td></tr>
</table>


<table style="width: 100%">
<tr><td>DESCRIPCION</td><td><center>CANTIDAD</center></td><td><center>TOTAL</center></td></tr>
<tr><center><td colspan="3">----------------------------------------</center></td></tr>
<?php 
   $detalle   = $oGlobals->verOpcionesPor("mov_r_pedidos", " AND documento = '".$documento."'", 1);
                if($detalle != 2){                    
                    $total= 0;
                    $unid = 0;
                    $cant = 0;
                    $dcto = 0;
                    foreach ($detalle as $detalle) {
                        
                        $unid=$unid+$detalle["cantidad_pedida"];
                        $dcto=$dcto+$detalle["dcto"];
 ?>
                        <tr>
                            <td><?= utf8_encode(substr($detalle["detalle"], 0, 15))?></td>
                            <td><center><?= number_format($detalle["cantidad_pedida"], 0, "", ".")?></center></td>
                            <td><center>$ <?php $valorunitario=$detalle["valor_unitario"]*$detalle["cantidad_pedida"]; echo number_format($valorunitario, 0, "", ".");
                            $total=$total+$valorunitario;?></center></td>
                        </tr>
  <?php 
                  $cant++;

                  $totalf=$total-$dcto;
 }
 }
?>
<tr><center><td colspan="3">----------------------------------------</center></td></tr>
</table>
<table style="width: 100%">
<tr><td>CANTIDAD :    </td><td><?= number_format($unid, 0, "", ".")?></td></tr>
<tr><td>SUBTOTAL :    </td><td>$ <?= number_format($total, 0, "", ".")?></td></tr>
<tr><td>DESCUENTOS :  </td><td>$ <?= number_format($dcto, 0, "", ".")?></td></tr>
<tr><td>TOTAL :       </td><td>$ <?= number_format($totalf, 0, "", ".")?></td></tr>
<tr><center><td colspan="2">----------------------------------------</center></td></tr>
</table>

<table style="width: 100%">
<tr><td>MEDIOS DE PAGO</td><td><center></center></td></tr>
<tr><center><td colspan="2">----------------------------------------</center></td></tr>
<tr><td>EFECTIVO :</td><td align="right">$ <?= number_format($totalf, 0, "", ".")?>&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
<tr><center><td colspan="2">----------------------------------------</center></td></tr>
</table>
<br>

<table style="width: 90%">
<tr><td><center>GRACIAS POR SU COMPRA</center></td></tr>
<tr><td><center>**** ORIGINAL ****</center></td></tr>
<tr><td><center>&nbsp;</center></td></tr>
<tr><td><center>Sistema Desarrollado</center></td></tr>
<tr><td><center>www.kword.co</center></td></tr>
<tr><td><center>318 479 2110</center></td></tr>
<tr><td><center><img src="../static-pictures/all/qr_img.png" alt=""></center></td></tr>

</table>



</center>
</div>
<head> 
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../pos/vender-pos.html">
</head>
</body>