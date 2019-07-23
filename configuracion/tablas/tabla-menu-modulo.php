<div class="tabletable">
	<div class="table-danger">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Menú</th>
                <th>Directorio</th>
                <th>Enlace</th>
                <th>Icono</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody style="font-size:12px;">
            <?php foreach($modulos_menu as $menu){?>
                    <tr id="tr<?= utf8_encode($menu["id"])?>">

                        <td><?= utf8_encode($menu["opcion_modulo"]);?></td>
                        <td><?= utf8_encode($menu["directorio"]);?></td>
                        <td><?= utf8_encode($menu["enlace"]);?></td>
                        <td><?= utf8_encode($menu["icono"]);?></td>
                        <td align="center">
                        	
                            
                        	<i class="btn btn-default btn-xs fa fa-edit btnEditarMenuModulo" id="<?= utf8_encode($menu["id"])?>"  title="Editar módulo"></i>
                            <i class="btn btn-default btn-xs fa fa-trash btn_delte_menu_modulo" id="<?= utf8_encode($menu["id"])?>"  title="Eliminar módulo"></i>
                            
                        </td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
	</div>
</div>