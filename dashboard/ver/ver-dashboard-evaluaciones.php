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
              $usuarios = "SELECT count(*) FROM config_usuarios";
              $usuarioss = $oGlobals->verPorConsultaPor($usuarios, 0); 
              $cantidad_usuarios=$usuarioss[0];

              $usuarios_eva = "SELECT count(DISTINCT id_usuario) FROM mov";
              $usuarios_eval = $oGlobals->verPorConsultaPor($usuarios_eva, 0); 
              $usuarios_evaluados=$usuarios_eval[0];

              $valor_salida = "SELECT sum(sub_total) FROM mov_r where tipo_documento='REM'";
              $variable3 = $oGlobals->verPorConsultaPor($valor_salida, 0); 
              $valor_s=$variable3[0];





              ?>
        
             
                <div class="col-md-3">
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
                                    <center><span class="text-muted">Cantidad de Usuarios</span></center>
                                    <center><span class="font-size-40"><span class="text-primary"><?= number_format($cantidad_usuarios,0, "", ".");?></span></span></center>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="col-md-3">
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
                                    <center><span class="text-muted">Usuarios Evaluados</span></center>
                                    <center><span class="font-size-40"><span class="text-primary"><?= number_format($usuarios_evaluados,0, "", ".");?></span></span></center>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-md-3">
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
                                    <center><span class="text-muted">Cantidad de Usuarios</span></center>
                                    <center><span class="font-size-40"><span class="text-primary"><?= number_format($cantidad_usuarios,0, "", ".");?></span></span></center>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="col-md-3">
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
                                    <center><span class="text-muted">Cantidad de Usuarios</span></center>
                                    <center><span class="font-size-40"><span class="text-primary"><?= number_format($cantidad_usuarios,0, "", ".");?></span></span></center>
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
<!-- <div class="col-sm-12" align="right">
<?=include 'tablas/tb-inventarios.php';?>
</div>  -->              
</div>


