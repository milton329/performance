<div id="rsp_elim"></div>

<div class="table-responsive">
    <table class="table table-bordered table-hover dataTables-example" >
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Cargo</th>
                <th>Documento</th>
                <th>Fecha Doc</th>
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
                        <td><?= utf8_encode(strtoupper($objetivo["estados_mov"]));?></td>
                        <td align="center">
                            <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura('<?= $objetivo["id"];?>', 'evaluaciones', 'load_modulo', 2);" title="Editar" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>
                            <!-- <a href="" onClick="Funciones.eliminar_registro('<?= $objetivo["id"];?>', 'competencias_2', 'rsp_elim');" title="Eliminar" data-toggle="modal" class="btn btn-default btn-xs fa fa-trash"></a> -->
                        </td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>