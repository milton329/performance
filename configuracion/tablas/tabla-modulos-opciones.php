
<div id="rspRed"></div>

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
        <tbody id="tb_body_opc">
            <?php 
				if($opciones != 2){ 
					foreach($opciones as $menu){
			?>
                        <tr id="tr_opc_<?= utf8_encode($menu["id"])?>">
                            <td><?= utf8_encode($menu["opcion_modulo"]);?></td>
                            <td><?= utf8_encode($menu["directorio"]);?></td>
                            <td><?= utf8_encode($menu["enlace"]);?></td>
                            <td><?= utf8_encode($menu["icono"]);?></td>
                            <td align="center">
                                <i class="btn btn-default btn-xs fa fa-edit"  onClick="Funciones.cargar_formulario(<?= $menu["id"];?>, 'config_modulos_opciones', 'rspRed', 'div-modulo-opcion', 'frm-modulo-opcion');" title="Editar opción"></i>
                                <i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $menu["id"];?>, 'config_modulos_opciones', 'rspRed');" id="<?= utf8_encode($menu["id"])?>" title="Eliminar opción"></i>
                            </td>
                        </tr>
            <?php 
					} 
				}
			?>
        </tbody>
    </table>
	</div>
</div>