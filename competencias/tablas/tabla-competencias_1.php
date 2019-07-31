<div id="rsp_elim"></div>
<form action="../process/competencias/accion-competencias_1_valor.php" id="frm-crear-objetivo" name="frm-crear-objetivo" method="post"  class="form_sdv form-horizontal"> 
<a href="#load_modulo" onClick="Funciones.cargar_modal_estructura('0_<?= $tipo;?>_0', 'competencias_1', 'load_modulo', 2);" class="btn btn-danger btn-outline" data-toggle="modal" style="float: right;">
          <span class="btn-label-icon left fa fa-plus"></span>Nuevo <?= $tipo_detalle;?>
        </a><br/><br/> 
<div class="table-responsive">
    <table class="table  table-bordered table-hover" >
        <thead>
            <tr>
                <th>Tipoo</th>
                <th><?= $tipo_detalle;?></th>
                <th>Valor</th>
                <th>Rol</th>
				<th>Creado Por</th>
                <th>Fecha Modificado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody id="tb_body">
            <?php 
            $num=1;
            foreach($objetivos as $objetivo){
            //crear los posibles id
            $idd="id".$num;
            $puntuacion="puntuacion".$num;
            ?>
            <input type="hidden" name="id_rol" id="id_rol" value="<?=$objetivo["id_rol"];?>">
            <input type="hidden" name="tipo" id="tipo" value="<?=$objetivo["tipo"];?>">
            <input type="hidden" name="<?=$idd;?>" id="<?=$idd;?>" value="<?=$objetivo["id"];?>">
                    <tr id="tr_user_<?= $objetivo["id"];?>">
                        <td><?= utf8_encode($objetivo["tipo"]);?></td>
                        <td><?= utf8_encode($objetivo["nombre"]);?></td>
                        <td><input class="form-control form-group-margin" type="text" id="<?=$puntuacion;?>" name="<?=$puntuacion;?>" value="<?= utf8_encode($objetivo["valor"]);?>"/></td>
                        <td><?= utf8_encode($objetivo["rol"]);?></td>
                        <td><?= utf8_encode($objetivo["creado_por"]);?></td>
                        <td><?= utf8_encode($objetivo["fecha_modificacion"]);?></td>
                        <td align="center" style="width:13%;">
                            <a href="../competencias/menu_detalle-competencia_<?= $objetivo["id"];?>.html" target="_blank" class="btn btn-default btn-xs fa fa-eye" title="Ver"></a>
							<a href="#load_modulo" onClick="Funciones.cargar_modal_estructura('0_<?=$tipo;?>_<?= $objetivo["id"];?>', 'competencias_1', 'load_modulo', 2);" title="Editar" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>
                            <a href="" onClick="Funciones.eliminar_registro('<?= $objetivo["id"];?>', 'competencias_1', 'rsp_elim');" title="Eliminar" data-toggle="modal" class="btn btn-default btn-xs fa fa-trash"></a>
                        </td>
                    </tr>
            <?php $num=$num+1;} ?>
        </tbody>
    </table>
</div>
                        <div class="panel-footer text-right" style="background: none !important;">
                            <button class="btn btn-danger" type="submit">Guardar valores ponderados</button>
                        </form>
</div>
<div id="rsp-frm-crear-objetivo"></div>
<div id="rsp-frm-crear-objetivos"></div>

<div id="load_modulo" class="modal fade" role="dialog"></div></div>
