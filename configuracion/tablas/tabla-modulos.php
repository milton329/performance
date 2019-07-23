<div class="tabletable">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Módulo</th>
                <th width="20%">Icono</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody id="tb_body">
            <?php foreach($modulos as $modulo){?>
                    <tr id="tr_mod_<?= $modulo["id"];?>">
                        <td><?= utf8_encode($modulo["modulo"]);?></td>
                        <td><i class="<?= utf8_encode($modulo["icono"]);?>"></i></td>
                        <td align="center">
                            <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura('<?= $modulo["id"];?>', 'info-modulo', 'load_modulo', 2);" title="Ver opciones de módulo" data-toggle="modal"><i class="btn btn-default btn-xs fa fa-bars"></i></a>
							<a href="#load_modulo" onClick="Funciones.cargar_modal_estructura('<?= $modulo["id"];?>', 'config_modulos', 'load_modulo', 1);" title="Editar módulo" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>
                        </td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>