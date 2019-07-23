<div class="page-header">
    <div class="col-md-4 text-xs-center text-md-left text-nowrap">
      <h1>
        <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-tachometer"></i>Colombia Compra / Control de procesos /</span>
        Competidores
      </h1>
    </div>
</div>


        <?php 

            $sql = "SELECT c.id, c.competidor, SUM(ddc.sub_total_adjudicado) AS total_adjudicado, COUNT(d.adjudicada) AS cantidad_gan
                    FROM documentos AS d
                    INNER JOIN competidores AS c ON d.adjudicada_a = c.id
                    INNER JOIN documentos_detalle_cotizacion AS ddc ON d.documento = ddc.documento 
                    GROUP BY d.adjudicada_a
                    ORDER BY SUM(ddc.sub_total_adjudicado) DESC";
        
            $competidores = $oGlobals->verPorConsultaPor($sql, 1);
        ?>            





<div class="row">                                 
    <div class="col-md-7">
        <div class="panel">
          <div class="panel-heading bg-primary darker">
            <div class="panel-title">Competidores <i class=" middle right ion-map font-size-18" style="float: right;"></i></div>
          </div>
          <div class="table-responsive">
                <table class="table table-striped valign-middle">
                    <thead>
                        <tr>
                            <th>Posición</th>
                            <th>Competidor</th>
                            <th class="text-xs-right">Ganadas</th>
                            <th class="text-xs-right">Valor</th>
                            <th class="text-xs-right">Opc</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if($competidores != 2){
                                
                                    $estado = "";          
                                    $total = 0;
                                    $i = 1;
                                    $t_cant  = 0;

                                foreach($competidores as $competidor){
                                    
                                    $total += $competidor["total_adjudicado"];
                                    $sql  = "SELECT COUNT(*) AS cantidad_gan FROM documentos WHERE tipo_documento = 'COT' AND adjudicada = 1 AND adjudicada_a = '".$competidor["id"]."' ";
                                    $cant = $oGlobals->verPorConsultaPor($sql, 0);
                                    
                                    $t_cant += $cant["cantidad_gan"];
                        ?>
                                    <tr>
                                        <td class="text-xs-center"><?= $i?></td>    
                                        <td><a href="#"><?= utf8_encode($competidor["competidor"])?></a></td>
                                        <td class="text-xs-right"><?= number_format($cant["cantidad_gan"], 0, "", ".")?></td>
                                        <td class="text-xs-right"><?= number_format($competidor["total_adjudicado"], 0, "", ".")?></td>
                                        <td class="text-xs-center">
                                            <a href="#load_cot" class="btn btn-xs" onClick="Funciones.cargar_modal_estructura(<?= $competidor["id"]?>, 'estadistica-competidor', 'load_cot', 2);" data-toggle='modal'><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                        <?php 
                                    $i++;
                                }
                        ?>
                                    <tr>
                                        <td class="text-xs-left"></td>
                                        <td class="text-xs-left"></td>
                                        <td class="text-xs-right"><strong><?= number_format($t_cant, 0, "", ".");?></strong></td>
                                        <td class="text-xs-right"><strong><?= number_format($total, 0, "", ".");?></strong></td>
                                        <td class="text-xs-right"></td>
                                    </tr>
                        <?php       
                            }
                        ?>
                    </tbody>
                </table>
          </div>
        </div>
    </div>
    
    <div class="col-md-5">
      
            <div class="m-b-1 text-muted font-weight-semibold font-size-11">Competidores</div>
            <div id="chart"></div>
    
    </div>
</div>

<div class="modal fade" id="load_cot" role="dialog"></div>  
<div id="load_cotttt" class="modal fade" tabindex="-1" data-focus-on="input:first" style="display: none;"></div>    





<script>
    var chart = c3.generate({

        data: {
            url: '../process/dashboard/grafico-competidores.php',
            mimeType: 'json',
            type: 'pie'
        }
    
    });

</script>



