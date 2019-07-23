<div style="display:none;">
<?php  

    //datos de la empresa
    $empresa = $oGlobals->verOpcionesPor("empresas", "", 0);
    $nombre_empresa=$empresa[nombre_empresa];
    $codigo=$empresa[codigo];
    $descripcion=$empresa[descripcion];
    $celular=$empresa[celular];

    //datos del cuadre
    $cuadre = $oGlobals->verOpcionesPor("pos_cuadre", " AND id = $id", 0);
    $numero=$cuadre[numero];
    $caja=$cuadre[caja];
    $cajero=$cuadre[cajero];
    $unidades=$cuadre[unidades];
    $valor=$cuadre[valor];
    $almacen=$cuadre[almacen];
    $fecha=$cuadre[fecha];
    $hora=$cuadre[horacierre];

    //datos del almacen
     $info="select * FROM almacenes
     where codigo='".$almacen."'";
     $infor = $oGlobals->verPorConsultaPor($info, 0);
    //datos de la caja
     $info2="select * FROM pos_cajas
     where codigo='".$caja."'";
     $infor2 = $oGlobals->verPorConsultaPor($info2, 0);

     //CONSECUTIVOS FACTURACION INCIAL
     $consecutivo_ini="SELECT documento FROM mov WHERE cuadre='".$numero."' ORDER BY id ASC LIMIT 1";
     $consecutivo_inii = $oGlobals->verPorConsultaPor($consecutivo_ini, 0);

     //CONSECUTIVOS FACTURACION FINAL
     $consecutivo_fin="SELECT documento FROM mov WHERE cuadre='".$numero."' ORDER BY id DESC LIMIT 1";
     $consecutivo_finn = $oGlobals->verPorConsultaPor($consecutivo_fin, 0);

     //TOTALES
     $totales="SELECT COUNT(documento) as 'clientes', sum(cantidad) as 'cantidad', sum(valor) as 'valor' FROM `mov` WHERE cuadre='".$numero."' and cajero='".$cajero."' and caja='".$caja."' and cod_almacen='".$almacen."'";
     $totaless = $oGlobals->verPorConsultaPor($totales, 0);


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
<tr><td><center>NIT : <?=$codigo;?></center></td></tr>
<tr><td><center><?=$descripcion;?></center></td></tr>
<tr><td><center>TEL : <?=$celular;?></center></td></tr>
<tr><td><center>DIR : CLL 100 G 50 AS 54 </center></td></tr>
<tr><td><center>&nbsp;&nbsp;&nbsp;</center></td></tr>
<tr><td>ALMACEN : <?= strtoupper($infor["nombre"]);?></td></tr>
<tr><td>CAJA : <?= $infor2["nombre"];?></td></tr>
<tr><td>CAJERO : <?= $cajero;?></td></tr>
<tr><td>CUADRE No : <?= $numero;?></td></tr>
<tr><td>FECHA     : <?= $oGlobals->fecha($fecha);?></td></tr>
<tr><td>HORA      : <?= $hora;?></td></tr>
<tr><td><center>---------------------------------------------------------</center></td></tr>
<tr><td>CONSECUTIVO INICIAL : <?=$consecutivo_inii["documento"];?></td></tr>
<tr><td>CONSECUTIVO FINAL   : <?=$consecutivo_finn["documento"];?></td></tr>
<tr><td>TOTAL CLIENTES      : <?=$totaless["clientes"];?></td></tr>
<tr><td>TOTAL UNIDADES      : <?=$totaless["cantidad"];?></td></tr>
<tr><td><center>---------------------------------------------------------</center></td></tr>
</table>
<table style="width: 100%">
<tr><td>MEDIOS DE PAGO</td><td><center></center></td></tr>
<tr><center><td colspan="2">---------------------------------------------------------</center></td></tr>
<tr><td>BASE :</td><td align="right">$ <?= number_format($infor2["base"], 0, "", ".")?>&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
<tr><td>EFECTIVO :</td><td align="right">$ <?= number_format($totaless["valor"], 0, "", ".")?>&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
<tr><td>TOTAL :</td><td align="right">$ <?= number_format($valor, 0, "", ".")?>&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
<tr><center><td colspan="2">---------------------------------------------------------</center></td></tr>
</table>
<br>

<table style="width: 100%">
<tr><td><center>Rso No <?=$infor2["alm_resolucion"];?> del <?=$oGlobals->fecha($infor2["alm_fec_res"]);?></center></td></tr>
<tr><td><center>Rango del <?=$infor2["alm_con_ini"];?> al <?=$infor2["alm_con_fin"];?></center></td></tr>
<tr><td><center>**** ORIGINAL ****</center></td></tr>
<tr><td><center>&nbsp;</center></td></tr>
<tr><td><center>www.kword.co</center></td></tr>
<tr><td><center>3184792210</center></td></tr>
<tr><td><center><img src="../static-pictures/all/qr_img.png" alt=""></center></td></tr>

</table>

</center>
</div>
<head> 
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=../informes/menu_consultar-cuadres.html">
</head>
</body>