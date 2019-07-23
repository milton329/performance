<div class="page-header">
    <div class="col-md-4 text-xs-center text-md-left text-nowrap">
      <h1>
        <span class="text-muted font-weight-light"><i class="page-header-icon menu-icon fa fa-tachometer"></i>Dashboard / </span>
        Información general
      </h1>
    </div>
</div> 


            <div class="row">

              <!-- Stats -->

               <!-- graficas milton torta -->
              
              <?php $icono = "ion-arrow-graph-up-right";
              $totaldia = "SELECT sum(sub_total) FROM mov_r where fecha_registro>='".date("Y-m-d")."' and tipo_documento='REM'";
              $variable1 = $oGlobals->verPorConsultaPor($totaldia, 0); 
              $total_dia=$variable1[0];

              $totalmes = "SELECT sum(sub_total) FROM mov_r where periodo='".date("m")."' and tipo_documento='REM'";; 
              $variable2 = $oGlobals->verPorConsultaPor($totalmes, 0); 
              $total_mes=$variable2[0];

              $totalano = "SELECT sum(sub_total) FROM mov_r where year='".date("Y")."' and tipo_documento='REM'";
              $variable3 = $oGlobals->verPorConsultaPor($totalano, 0); 
              $total_ano=$variable3[0];

              ?>
              
              <?php $icono = "ion-arrow-graph-up-right";?>
        
             
                <div class="col-md-4">
                    <div class="panel box">
                      <div class="box-row">
                        <div class="box-cell col-sm-4 p-a-3 valign-middle bg-primary">
                          <span class="font-size-16 font-weight-light"><?= $oGlobals->dia(date("l"));?></span><br>                          
                          <span class="font-size-16 font-weight-light"><?= date("d/m/Y");?></span>
                        </div>
                        <div class="box-cell col-sm-8">
                          <div class="box-container">                           
                            <div class="box-row">
                              <div class="box-cell">
                                <div class="box-container">                                  
                                  <div class="box-cell p-x-2 p-y-1">
                                    <center><span class="text-muted">Ventas Dia</span></center>
                                    <center><span class="font-size-24"><span class="text-primary">$ <?= number_format($total_dia,0, "", ".");?></span></span></center>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel box">
                      <div class="box-row">
                        <div class="box-cell col-sm-4 p-a-3 valign-middle bg-primary">
                          <span class="font-size-16 font-weight-light">Mes :</span><br>
                          <i class="fa fa-calendar font-size-20"></i>
                          <span class="font-size-16 font-weight-light"><?= date("m");?></span>
                        </div>
                        <div class="box-cell col-sm-8">
                          <div class="box-container">                           
                            <div class="box-row">
                              <div class="box-cell">
                                <div class="box-container">                                  
                                  <div class="box-cell p-x-2 p-y-1">
                                    <center><span class="text-muted">Ventas Mes</span></center>
                                    <center><span class="font-size-24"><span class="text-primary">$ <?= number_format($total_mes,0, "", ".");?></span></span></center>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel box">
                      <div class="box-row">
                        <div class="box-cell col-sm-4 p-a-3 valign-middle bg-primary">
                          <span class="font-size-16 font-weight-light">Año :</span><br>
                          <i class="fa fa-calendar font-size-20"></i>
                          <span class="font-size-16 font-weight-light"><?= date("Y");?></span>
                        </div>
                        <div class="box-cell col-sm-8">
                          <div class="box-container">                           
                            <div class="box-row">
                              <div class="box-cell">
                                <div class="box-container">                                  
                                  <div class="box-cell p-x-2 p-y-1">
                                    <center><span class="text-muted">Ventas Año</span></center>
                                    <center><span class="font-size-24"><span class="text-primary">$ <?= number_format($total_ano,0, "", ".");?></span></span></center>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

<div class="page-header">
    <div class="col-md-4 text-xs-center text-md-left text-nowrap">
      <h1>
        <span class="text-muted font-weight-light"><i class="page-header-icon menu-icon fa fa-tachometer"></i>Dashboard / </span>
        Ventas del ultimo mes
      </h1>
    </div>
</div> 



 <div class="panel">
  <div class="panel-body">
    <div class="table-danger">   

 <!-- graficas milton lineal -->

<div id="container"></div>                             
                             
<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'areaspline'
    },
    title: {
        text: ''
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 150,
        y: 100,
        floating: true,
        borderWidth: 1,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
    xAxis: {
        categories: [
        
<?php                              
// traer fechas de la tabla mov_r 
 $fechas="select fecha_registro FROM mov_r where tipo_documento='REM' and periodo='".date("m")."' group by fecha_registro order by fecha_registro DESC";
$variable1 = $oGlobals->verPorConsultaPor($fechas, 1);
$cant = 0;
foreach ($variable1 as $fecha) {
?>
'<?php echo $oGlobals->fecha($fecha[0]);?>',
<?php
$cant++;
}
?>                             

                    ],
        plotBands: [{ // visualize the weekend
            from: 4.5,
            to: 6.5,
        }]
    },
    yAxis: {
        title: {
            text: '$'
        }
    },
    tooltip: {
        shared: true,
        valueSuffix: ' $'
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        areaspline: {
            fillOpacity: 0.5
        }
    },
    series: [{
        name: 'Ventas',
        data: [
        <?php                              
// traer ventas de la tabla mov_r                               
$ventas="select fecha_registro,sum(sub_total) FROM mov_r where tipo_documento='REM' and periodo='".date("m")."' group by fecha_registro order by fecha_registro DESC";
$variable2 = $oGlobals->verPorConsultaPor($ventas, 1);
$cant = 0;
foreach ($variable2 as $venta) {

 echo $venta[1].",";   

$cant++;
}
?>
        ]}, { 
        name: 'Unidades',
        data: [
        <?php                              
// traer unidades de la tabla mov_r                               
$unidades="select fecha_registro,sum(salida) FROM mov_r where tipo_documento='REM' and periodo='".date("m")."' group by fecha_registro order by fecha_registro DESC";
$variable3 = $oGlobals->verPorConsultaPor($unidades, 1);
$cant = 0;
foreach ($variable3 as $unidad) {

 echo $unidad[1].",";   

$cant++;
}
?>

        ]}
              ]
});
</script>


<br><br><br>
<div class="page-header">
    <div class="col-md-4 text-xs-center text-md-left text-nowrap">
      <h1>
        <span class="text-muted font-weight-light"><i class="page-header-icon menu-icon fa fa-tachometer"></i></span>
        Detalle del ultimo mes
      </h1>
    </div>
</div>
<div class="col-sm-12" align="right">
<?=include 'tablas/tb-documentos.php';?>
</div> 
      </div>
    </div>
</div>