<div id="rsp_elim"></div>

<div class="tabletable">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Cargo</th>
                <th>Documento</th>
                <th>Fecha Doc</th>
                <th>Fecha Mod</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody id="tb_body">
            <?php foreach($objetivos as $objetivo){?>
                    <tr id="tr_user_<?= $objetivo["id"];?>">
                        <td><?= utf8_encode($objetivo["nombre"]);?></td>
                        <td><?= utf8_encode($objetivo["rol"]);?></td>
                        <td><?= utf8_encode($objetivo["documento"]);?></td>
                        <td><?= utf8_encode($objetivo["fecha_documento"]);?></td>
                        <td><?= utf8_encode($objetivo["fecha_modificacion"]);?></td>
                        <td><?= utf8_encode(strtoupper($objetivo["estados_mov"]));?></td>
                        <td align="center">
                            <a href="../evaluaciones/menu_detalle-competencia1-evaluaciones_<?= $objetivo["documento"];?>.html"  class="btn btn-default btn-xs fa fa-eye" title="Ver"></a>
                        </td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>