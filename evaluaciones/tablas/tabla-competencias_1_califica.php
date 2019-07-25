<div id="rsp_elim"></div>

<div class="table-responsive">
    <table class="table table-bordered table-hover dataTables-example" >
        <thead>
            <tr>
                <th>Documento</th>
                <th>Tipo</th>
                <th><?= $tipo_detalle;?></th>
                <th>Completado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody id="tb_body">
            <?php foreach($objetivos as $objetivo){?>
                    <tr id="tr_user_<?= $objetivo["id"];?>">
                        <td><?= utf8_encode($objetivo["documento"]);?></td>
                        <td><?= utf8_encode($objetivo["tipo"]);?></td>
                        <td><?= utf8_encode($objetivo["nombre"]);?></td>
                        <td><center>
                        <?php                      
                        if ($estado<5) {$objetivo_valor = $objetivo["completado"];}
                        if ($estado>4) {$objetivo_valor = $objetivo["completado_consenso"];}
                        ?>
                            ( <?= utf8_encode($objetivo_valor);?> de <?= utf8_encode($objetivo["total"]);?> )</center>
                        </td>
                        <td align="center">
                            <a href="../evaluaciones/menu_detalle-competencia2-evaluaciones_<?= $objetivo["id_auto_evaluaciones"];?>.html"  class="btn btn-default btn-xs fa fa-edit" title="Ver"></a>
                        </td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>