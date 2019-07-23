
<div id="rspRed"></div>
<div id="resp_status"></div>

<div class="tabletable">
	<div class="table-danger">
    
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Sub movimiento</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody id="tb_body_opc">
            <?php 
				if($submovimientos != 2){ 
					foreach($submovimientos as $submovimiento){
			?>
                        <tr id="tr_opcttt_<?= utf8_encode($submovimiento["id"])?>">
                            <td><?= utf8_encode($submovimiento["sub_movimiento"]);?></td>
                            <td align="center">
                                <i class="btn btn-default btn-xs fa fa-edit"  onClick="Funciones.cargar_formulario(<?= $submovimiento["id"];?>, 'tipos_movimientos_subconceptos', 'rspRed', 'div-modulo-opcion', 'frm-modulo-opcion');" title="Editar submovimiento"></i>
                                <i class="btn btn-default btn-xs fa fa-trash" onClick="Funciones.eliminar_registro(<?= $submovimiento["id"];?>, 'tipos_movimientos_subconceptos', 'rspRed', 'tr_opcttt_');" id="<?= utf8_encode($menu["id"])?>" title="Eliminar submovimiento"></i>
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