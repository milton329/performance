<div class="page-header">
    <div class="col-md-4 text-xs-center text-md-left text-nowrap">
      <h1>
        <span class="text-muted font-weight-light"><i class="page-header-icon menu-icon fa fa-tachometer"></i>Dashboard / </span>
        Información general de Inventarios
      </h1>
    </div>
</div> 


            <div class="row">

              <!-- Stats -->
              
              <!-- graficas milton torta -->
              
              <?php $icono = "ion-arrow-graph-up-right";
              $unidades_stock = "SELECT sum(entrada-salida) FROM mov_r";
              $variable1 = $oGlobals->verPorConsultaPor($unidades_stock, 0); 
              $unidades=$variable1[0];

              $valor_entradas = "SELECT sum(sub_total) FROM mov_r where tipo_documento='COM'";
              $variable2 = $oGlobals->verPorConsultaPor($valor_entradas, 0); 
              $valor_e=$variable2[0];

              $valor_salida = "SELECT sum(sub_total) FROM mov_r where tipo_documento='REM'";
              $variable3 = $oGlobals->verPorConsultaPor($valor_salida, 0); 
              $valor_s=$variable3[0];

              $valor_f= $valor_e-$valor_s;  



              ?>
        
             
                <div class="col-md-6">
                    <div class="panel box">
                      <div class="box-row">
                        <div class="box-cell col-sm-4 p-a-3 valign-middle bg-primary">
                          <span class="font-size-16 font-weight-light"><?= $oGlobals->dia(date("l"));?></span><br>
                          <i class="fa fa-calendar font-size-20"></i>
                          <span class="font-size-16 font-weight-light"><?= date("d/m/Y");?></span>
                        </div>
                        <div class="box-cell col-sm-8">
                          <div class="box-container">                           
                            <div class="box-row">
                              <div class="box-cell">
                                <div class="box-container">                                  
                                  <div class="box-cell p-x-2 p-y-1">
                                    <center><span class="text-muted">Unidades</span></center>
                                    <center><span class="font-size-40"><span class="text-primary"><?= number_format($unidades,0, "", ".");?></span></span></center>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel box">
                      <div class="box-row">
                        <div class="box-cell col-sm-4 p-a-3 valign-middle bg-primary">
                          <span class="font-size-16 font-weight-light"><?= $oGlobals->dia(date("l"));?></span><br>
                          <i class="fa fa-calendar font-size-20"></i>
                          <span class="font-size-16 font-weight-light"><?= date("d/m/Y");?></span>
                        </div>
                        <div class="box-cell col-sm-8">
                          <div class="box-container">                           
                            <div class="box-row">
                              <div class="box-cell">
                                <div class="box-container">                                  
                                  <div class="box-cell p-x-2 p-y-1">
                                    <center><span class="text-muted">Valor Total</span></center>
                                    <center><span class="font-size-40"><span class="text-primary">$ <?= number_format($valor_f,0, "", ".");?></span></span></center>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

                
 <!-- graficas milton torta -->
<div id="container" class="col-sm-6" align="left"></div>


    <script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    title: {
        text: 'Inventario Global'
    },
    subtitle: {
        text: '<?= date("d/m/Y");?>'
    },
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 45
        }
    },
     series: [{
        name: 'Productos',
        data: [
<?php
$torta="select detalle, sum(entrada-salida) FROM mov_r group by detalle";
$datos = $oGlobals->verPorConsultaPor($torta, 1); 

$cant = 0;
foreach ($datos as $dato) {
?>     
['<?php echo $dato[0];?>', <?php echo $dato[1];?>],
<?php
$cant++;
}
?> ]
    }]
});

<?php
 
?>
    </script>
  <!-- graficas milton torta fin -->
  <!-- graficas milton barras incio -->

  <div id="container2" class="col-sm-6" align="right"></div>

  <script type="text/javascript">

Highcharts.chart('container2', {
    title: {
        text: 'Inventario Global'
    },
    xAxis: {
        categories: ['Inventario ']
    },
    labels: {
        items: [{
            html: 'Exitencia actual de mercancia',
            style: {
                left: '50px',
                top: '18px',
                color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
            }
        }]
    },

series:[
<?php
$torta="select detalle, sum(entrada-salida) FROM mov_r group by detalle";
$datos = $oGlobals->verPorConsultaPor($torta, 1); 

$cant = 0;
foreach ($datos as $dato) {
?>
{
        type: 'column',
        name: '<?php echo $dato[0];?>',
        data: [<?php echo $dato[1];?>]
},
<?php
$cant++;
}
?>
]
});
</script>
 <!-- graficas milton barras fin -->
<div class="col-sm-12" align="right">
<?=include 'tablas/tb-inventarios.php';?>
</div>               
</div>


