<div class="tabletable">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Almacen</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Base</th>
                <th>Resolucion</th>
                <th>Fecha Res</th>
                <th>Prefijo</th>
                <th>Cons Ini</th>
                <th>Cons Fin</th>
                <th>Cons Actual</th>
                
                <th>Opc</th>
            </tr>
        </thead>
        <tbody id="tb_body">
            <?php foreach($empresas as $empresa){?>
                    <tr id="tr_infddd_<?= $empresa["id"];?>">
                        <?php

                         $alm_codigo= $empresa["alm_codigo"];
                         $info="select * FROM almacenes
                        where codigo='".$alm_codigo."'";
                        $infor = $oGlobals->verPorConsultaPor($info, 0);
                        ?>
                        <td><?= utf8_encode($infor["nombre"]);?></td>
                        <td><?= utf8_encode($empresa["codigo"]);?></td>
                        <td><?= utf8_encode($empresa["nombre"]);?></td>
                        <td><?= number_format($empresa["base"],0, "", ".");?></td>
                        <td><?= utf8_encode($empresa["alm_resolucion"]);?></td>
                        <td><?= utf8_encode($empresa["alm_fec_res"]);?></td>
                        <td><?= utf8_encode($empresa["alm_prefijo"]);?></td>
                        <td><?= utf8_encode($empresa["alm_con_ini"]);?></td>
                        <td><?= utf8_encode($empresa["alm_con_fin"]);?></td>
                        <td><?= utf8_encode($empresa["num_cua"]);?></td>
                        <td align="center">
							<a href="#load_informe" onClick="Funciones.cargar_modal_estructura('<?= $empresa["id"];?>', 'almacenes', 'load_informe', 2);" title="Editar empresa" data-toggle="modal" class="btn btn-default btn-xs fa fa-edit"></a>
                        </td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</div>