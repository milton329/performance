<div class="tabletable">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Módulo</th>
                <th>Menú</th>
                <th>Opc</th>
            </tr>
        </thead>
        <tbody id="tb_body">
            <?php foreach($informes as $informe){?>
                    <tr id="tr_inf_<?= $informe["id"];?>">
                        <td><?= utf8_encode($informe["nombre"]);?></td>
                        <td><?= utf8_encode($informe["modulo"]);?></td>
                        <td><?= utf8_encode($informe["opcion_modulo"]);?></td>
                        <td align="center">
							<a href="#load_informe" onClick="Funciones.cargar_modal_estructura('<?= $informe["id"];?>', 'informe-opciones', 'load_informe', 2);" title="Opciones de informe" data-toggle="modal" class="btn btn-default btn-xs fa fa fa-cog"></a>
                            <a href="#load_informe" onClick="Funciones.cargar_modal_estructura('<?= $informe["id"];?>', 'informes', 'load_informe', 1);" title="Editar informe" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>
                        </td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>