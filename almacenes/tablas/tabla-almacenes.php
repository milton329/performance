<div class="tabletable">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Ciudad</th>
                <th>Departamento</th>
                <th>Opc</th>
            </tr>
        </thead>
        <tbody id="tb_body">
            <?php foreach($empresas as $empresa){?>
                    <tr id="tr_infddd_<?= $empresa["id"];?>">
                        <td><?= utf8_encode($empresa["codigo"]);?></td>
                        <td><?= utf8_encode($empresa["nombre"]);?></td>
                        <td><?= utf8_encode($empresa["direccion"]);?></td>
                        <td><?= utf8_encode($empresa["telefono"]);?></td>
                        <td><?= utf8_encode($empresa["ciudad"]);?></td>
                        <td><?= utf8_encode($empresa["departamento"]);?></td>
                        <td align="center">
							<a href="#load_informe" onClick="Funciones.cargar_modal_estructura('<?= $empresa["id"];?>', 'almacenes', 'load_informe', 2);" title="Editar empresa" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>
                        </td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>