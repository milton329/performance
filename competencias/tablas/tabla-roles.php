<div id="rsp_elim"></div>

<div class="table-responsive col-md-6">
    <table class="table  table-bordered table-hover" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Rol o Cargo</th>
                <th>Cantidad Usuarios</th>
                <th>Cantidad C.Principales</th>
            </tr>
        </thead>
        <tbody id="tb_body">
            <?php 
            $num=1;
            foreach($objetivos as $objetivo){
            ?>
                    <tr>
                        <td><?= utf8_encode($num);?></td>
                        <td><a href="#rsp-div-opc-asdf" onClick="Funciones.cargar_tab('<?=$objetivo["rol"];?>_<?=$tipo;?>', 'compentencias_principales', 'rsp-div-opc-asdf');" data-toggle="tab" role="tab"><?= utf8_encode($objetivo["rol"]);?></a></td>
                        <td><?= utf8_encode($objetivo["usuarios"]);?></td>
                        <td><?= utf8_encode($objetivo["competencias_1"]);?></td>
                    </tr>
            <?php $num=$num+1;} ?>
        </tbody>
    </table>
</div>

