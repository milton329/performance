<div id="rsp_elim"></div>

<div class="table-responsive">
    <table class="table table-bordered table-hover dataTables-example" >
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
                        <?php
                            if($objetivo["cerrado"]==7){ $color="#64FE2E";}
                            if($objetivo["cerrado"]<2){ $color="#FE2E2E";}
                            if($objetivo["cerrado"]>1 && $objetivo["cerrado"]<4){ $color="#FFFF00";}
                            if($objetivo["cerrado"]>3 && $objetivo["cerrado"]<6){ $color="#2E9AFE";}
                            if($objetivo["cerrado"]==6){ $color="#BDBDBD";}
                        ?>
                        <td style="background-color: <?=$color;?>"><b><center><?= utf8_encode(strtoupper($objetivo["estados_mov"]));?></center></b></td>
                        <td align="center">
                            <?php
                            if($objetivo["cerrado"]>2)
                            {
                            ?>
                            <a href="../evaluaciones/menu_detalle-competencia1-evaluaciones_<?= $objetivo["documento"];?>.html"  class="btn btn-default btn-xs fa fa-edit" title="Ver"></a>
                            <?php
                             }
                            ?>
                        </td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>