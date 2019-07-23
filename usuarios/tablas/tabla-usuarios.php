
<div id="rsp_elim"></div>

<div class="tabletable">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Usuario</th>
				<th>E-mail</th>
                <th>Rol</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody id="tb_body">
            <?php foreach($usuarios as $usuario){?>
                    <tr id="tr_user_<?= $usuario["id"];?>">
                        <td><?= utf8_encode($usuario["nombre"]);?></td>
                        <td><?= utf8_encode($usuario["usuario"]);?></td>
                        <td><?= utf8_encode($usuario["email"]);?></td>
                        <td><?= utf8_encode($usuario["rol"]);?></td>
                        <td align="center">
                            <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura('<?= $usuario["id"];?>', 'conf-usuario', 'load_modulo', 2);" title="Ver opciones de módulo" data-toggle="modal"><i class="btn btn-default btn-xs fa fa-shopping-bag"></i></a>
                            <a href="#load_modulo" onClick="Funciones.cargar_modal_estructura('<?= $usuario["id"];?>', 'clave-usuario', 'load_modulo', 2);" title="Cambiar clave" data-toggle="modal"><i class="btn btn-default btn-xs fa fa-lock"></i></a>
							<a href="#load_modulo" onClick="Funciones.cargar_modal_estructura('<?= $usuario["id"];?>', 'edit-usuario', 'load_modulo', 2);" title="Editar usuario" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>
                            <a href="" onClick="Funciones.eliminar_registro('<?= $usuario["id"];?>', 'config_usuarios', 'rsp_elim');" title="Editar módulo" data-toggle="modal" class="btn btn-default btn-xs fa fa-trash"></a>
                        </td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>