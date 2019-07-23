
<div id="rsp_elim"></div>

<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover dataTables-example" >
        <thead>
            <tr>
                <th>Grupo</th>
                <th>Objetivo</th>
				<th>Creado Por</th>
                <th>Fecha Modificado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody id="tb_body">
            <?php foreach($objetivos as $objetivo){?>
                    <tr id="tr_user_<?= $objetivo["id"];?>">
                        <td><?= utf8_encode($objetivo["grupo"]);?></td>
                        <td><?= utf8_encode($objetivo["nombre"]);?></td>
                        <td><?= utf8_encode($objetivo["creado_por"]);?></td>
                        <td><?= utf8_encode($objetivo["fecha_modificacion"]);?></td>
                        <td align="center">
							<a href="#load_modulo" onClick="Funciones.cargar_modal_estructura('<?= $objetivo["id"];?>', 'objetivos', 'load_modulo', 2);" title="Editar usuario" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>
                            <a href="" onClick="Funciones.eliminar_registro('<?= $objetivo["id"];?>', 'objetivos', 'rsp_elim');" title="Eiminar módulo" data-toggle="modal" class="btn btn-default btn-xs fa fa-trash"></a>
                        </td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>