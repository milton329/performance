<div class="tabletable">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Rol</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody id="tb_body_rol">
            <?php foreach($roles as $rol){?>
                    <tr id="tr_rol_<?= $rol["id"];?>">
                        <td><?= utf8_encode($rol["rol"]);?></td>
                        <td align="center">
                            <a href="#load_rol" onClick="Funciones.cargar_modal_estructura('<?= $rol["id"];?>', 'conf-rol', 'load_rol', 2);" title="Ver opciones de módulo" data-toggle="modal"><i class="btn btn-default btn-xs fa fa-bars"></i></a>
							<a href="#load_rol" onClick="Funciones.cargar_modal_estructura('<?= $rol["id"];?>', 'config_roles', 'load_rol', 1);" title="Editar módulo" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>
                        </td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>