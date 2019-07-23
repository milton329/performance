<div class="tabletable">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Empresa</th>
                <th>Título</th>
                <th>Nit</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Pagina Web</th>
                <th>Representante Legal</th>

                <th>Opc</th>
            </tr>
        </thead>
        <tbody id="tb_body">
            <?php foreach($empresas as $empresa){?>
                    <tr id="tr_infddd_<?= $empresa["id"];?>">
                        <td><?= utf8_encode($empresa["nombre_empresa"]);?></td>
                        <td><?= utf8_encode($empresa["titulo_html"]);?></td>
                        <td><?= utf8_encode($empresa["nit"]);?></td>
                        <td><?= utf8_encode($empresa["direccion"]);?></td>
                        <td><?= utf8_encode($empresa["telefono"]);?></td>
                        <td><?= utf8_encode($empresa["pagina"]);?></td>
                        <td><?= utf8_encode($empresa["representante_legal"]);?></td>
                        <td align="center">
							<a href="#load_informe" onClick="Funciones.cargar_modal_estructura('<?= $empresa["id"];?>', 'empresa', 'load_informe', 2);" title="Editar empresa" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>
                        </td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>