<div id="rsp_elim"></div>

<div class="tabletable">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Detalle</th>
                <th>Valor</th>
				<th>Creado Por</th>
                <th>Fecha Modificado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody id="tb_body">
            <?php foreach($objetivos as $objetivo){?>
                    <tr id="tr_user_<?= $objetivo["id"];?>">
                        <td><?= utf8_encode($objetivo["nombre"]);?></td>
                        <td style="width: 40%;"><?= utf8_encode($objetivo["detalle"]);?></td>
                        <td><?= utf8_encode($objetivo["valor"]);?></td>
                        <td><?= utf8_encode($objetivo["creado_por"]);?></td>
                        <td><?= utf8_encode($objetivo["fecha_modificacion"]);?></td>
                        <td align="center">
							<a href="#load_modulo" onClick="Funciones.cargar_modal_estructura('<?= $objetivo["id"];?>', 'puntuaciones', 'load_modulo', 2);" title="Editar" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>
                            <a href="" onClick="Funciones.eliminar_registro('<?= $objetivo["id"];?>', 'puntuaciones', 'rsp_elim');" title="Eliminar" data-toggle="modal" class="btn btn-default btn-xs fa fa-trash"></a>
                        </td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>