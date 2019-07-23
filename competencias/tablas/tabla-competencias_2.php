<div id="rsp_elim"></div>

<div class="table-responsive">
    <table class="table table-bordered table-hover dataTables-example" >
        <thead>
            <tr>
                <th>Tipo</th>
                <th><?= $tipo_detalle;?></th>
                <th>Valor    </th>
                <th>Rol</th>
				<th>Creado Por</th>
                <th>Fecha Modificado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody id="tb_body">
            <?php foreach($objetivos as $objetivo){?>
                    <tr id="tr_user_<?= $objetivo["id"];?>">
                        <td><?= utf8_encode($objetivo["tipo"]);?></td>
                        <td><?= utf8_encode($objetivo["nombre"]);?></td>
                        <td><?= utf8_encode($objetivo["valor"]);?> %</td>
                        <td><?= utf8_encode($objetivo["rol"]);?></td>
                        <td><?= utf8_encode($objetivo["creado_por"]);?></td>
                        <td><?= utf8_encode($objetivo["fecha_modificacion"]);?></td>
                        <td align="center">
                            <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura('0_<?=$tipo;?>_<?= $objetivo["id"];?>_<?= $objetivo["id_competencias_1"];?>', 'competencias_2', 'load_modulo', 2);" title="Editar" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>
                            <a href="" onClick="Funciones.eliminar_registro('<?= $objetivo["id"];?>', 'competencias_2', 'rsp_elim');" title="Eliminar" data-toggle="modal" class="btn btn-default btn-xs fa fa-trash"></a>
                        </td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>