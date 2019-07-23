<div class="page-header">
    <div class="col-md-4 text-xs-center text-md-left text-nowrap">
      <h1>
        <span class="text-muted font-weight-light"><i class="page-header-icon menu-icon fa fa-tachometer"></i>Dashboard / </span>
        Información general de cajas
      </h1>
    </div>
</div> 


    <div class="row">

        <div class="col-md-4">

        <!-- References -->

        <div class="panel">
          <div class="panel-heading">
            <div class="panel-title">Cajas</div>
          </div>

          <?php

              $sql = "SELECT MRC.tipo_movimiento, SUM(MRC.debito) AS t_debito, SUM(MRC.credito) as t_credito, 
                      (SUM(MRC.debito) - SUM(MRC.credito)) AS t_dif
                      FROM mov_r_cartera AS MRC
                      LEFT JOIN tipos_movimientos AS TM ON MRC.tipo_movimiento = TM.tipo_movimiento 
                      WHERE TM.financiero = 1 AND TM.tipo_cuenta = 1
                      GROUP BY tipo_movimiento";
              $cajas = $oGlobals->verPorConsultaPor($sql, 1);

              $t_cajas = 0;

              if($cajas != 2){

                foreach ($cajas as $caja) {

                  $t_caja   = $caja["t_debito"] - $caja["t_credito"];
                  $t_cajas += $t_caja;

                }


                foreach ($cajas as $caja) {

                  $t_caja   = $caja["t_debito"] - $caja["t_credito"];
                  
          ?>
                    <div class="box m-y-2">
                      <div class="box-cell valign-middle text-xs-center" style="width: 60px">
                        <i class="fa fa-money font-size-28 line-height-1 text-success"></i>
                      </div>
                      <div class="box-cell p-r-3">
                        <?= utf8_encode($caja["tipo_movimiento"]);?> <span class="text-muted"> </span> <strong><?= number_format($t_caja, 0, "", ".");?></strong>
                        
                      </div>
                    </div>

                    <hr class="m-a-0">     
          <?php  
                }    
              }
          ?>
                    <div class="box m-y-2">
                      <div class="box-cell valign-middle text-xs-center" style="width: 60px">
                        <i class="fa fa-money font-size-28 line-height-1 text-success"></i>
                      </div>
                      <div class="box-cell p-r-3">
                        <?= utf8_encode("Total en cajas");?> <span class="text-muted"> </span> <strong><?= number_format($t_cajas, 0, "", ".");?> </strong>
                        <div class="progress m-b-0" style="height: 5px; margin-top: 5px;">
                          <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                        </div>
                      </div>
                    </div>

                    <hr class="m-a-0">  

        <!-- / References -->

      </div>
            
    </div>
