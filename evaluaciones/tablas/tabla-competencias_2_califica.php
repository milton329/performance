<div id="rsp_elim"></div>

<div class="table-responsive">
    <table class="table table-bordered table-hover" >
        <thead>
            <tr>
                <th>Documento</th>
                <th>Tipo</th>
                <th><?= $tipo_detalle;?></th>
                <?php
                //verificar que tipo de estado es 
                if ($estado>4){
                    $action='accion-competencias_2_consenso.php';
                ?>
                <th>Autoevaluación</th>
                <th>Auditoria</th>
                <th>Consenso</th>
                <?php
                }
                if ($estado<5){
                    $action='accion-competencias_2_califica.php';
                ?>
                <th>Auditoria</th>
                <?php
                }
                ?>
            </tr>
        </thead>
        <tbody id="tb_body">
        <form action="../process/autoevaluaciones/<?=$action;?>" id="frm-crear-objetivo" name="frm-crear-objetivo" method="post"  class="form_sdv form-horizontal"> 
            <?php 
            $num=1;
            foreach($objetivos as $objetivo){
            //crear los posibles id
            $idd="id".$num;
            $puntuacion="puntuacion".$num;
                ?>
            <input type="hidden" name="documento" id="documento" value="<?=$objetivo["documento"];?>">  
            <input type="hidden" name="id_autoevaluaciones" id="id_autoevaluaciones" value="<?=$id;?>">
            <input type="hidden" name="<?=$idd;?>" id="<?=$idd;?>" value="<?=$objetivo["id"];?>">
                    <tr id="tr_user_<?= $objetivo["id"];?>">
                        <td><?= utf8_encode($objetivo["documento"]);?></td>
                        <td><?= utf8_encode($objetivo["tipo"]);?></td>
                        <td><?= utf8_encode($objetivo["nombre"]);?></td>
            <?php 
                if ($estado>4){
                //consultar que puntuacion es valor usuario
                 $puntua = "SELECT * FROM puntuaciones  where valor='".$objetivo["valor_usuario"]."'";
                 $puntuac = $oGlobals->verPorConsultaPor($puntua, 0);
                 $nombre_puntuac=$puntuac['nombre'];
            ?>
                        <td style="width: 20%;"><?= utf8_encode($nombre_puntuac);?></td> 
            <?php
            }
            ?>
                        <td style="width: 20%;">
            <?php 
            //consultar el campo cerrado de la tabla mov
            if ($objetivo["cerrado"]>4){
                //consultar que puntuacion es
                 $puntuacionesss = "SELECT * FROM puntuaciones  where valor='".$objetivo["valor"]."'";
                 $puntuacioness = $oGlobals->verPorConsultaPor($puntuacionesss, 0);
                 $nombre_puntuacion=$puntuacioness['nombre'];
            ?>
            <?=$nombre_puntuacion;?>
            <?php
            }else{                
            ?>
            <select  class="form-control form-group-margin" id="<?=$puntuacion;?>" name="<?=$puntuacion;?>" required/>
                                       <?php
                                       //verificar si trae valor
                                       if($objetivo["valor"]=='0.0'){$select_id='';$select_value='Seleccione';}
                                       if($objetivo["valor"]!='0.0'){
         //consultar que puntuacion es
         $puntuacionesss = "SELECT * FROM puntuaciones  where valor='".$objetivo["valor"]."'";
         $puntuacioness = $oGlobals->verPorConsultaPor($puntuacionesss, 0);

         $select_id=$objetivo["valor"];$select_value=$puntuacioness['nombre'];}
         ?>
                                        <option value="<?=$select_id;?>"><?=$select_value;?></option>
                                            <?php 
                                                $puntuaciones = $oGlobals->verOpcionesPor("puntuaciones", "", 1);
                                                foreach($puntuaciones as $puntuacion){
                                            ?>
                                                    <option value="<?= $puntuacion["valor"]?>"><?= utf8_encode($puntuacion["nombre"]);?></option>
                                            <?php 
                                                }
                                            ?>
            </select>
        <?php } ?>
        </td>
        <?php
        // verificar si ya esta en estado consenso
        if ($estado>4 && $estado<7){
        ?>
         <td style="width: 20%;">
            <select  class="form-control form-group-margin" id="<?=$puntuacion;?>" name="<?=$puntuacion;?>" required/>
                                       <?php
                                       //verificar si trae valor
                                       if($objetivo["valor_consenso"]=='0.0'){$select_id='';$select_value='Seleccione';}
                                       if($objetivo["valor_consenso"]!='0.0'){
         //consultar que puntuacion es
         $puntuacionesss = "SELECT * FROM puntuaciones  where valor='".$objetivo["valor_consenso"]."'";
         $puntuacioness = $oGlobals->verPorConsultaPor($puntuacionesss, 0);

         $select_id=$objetivo["valor_consenso"];$select_value=$puntuacioness['nombre'];}
         ?>
                                        <option value="<?=$select_id;?>"><?=$select_value;?></option>
                                            <?php 
                                                $puntuaciones = $oGlobals->verOpcionesPor("puntuaciones", "", 1);
                                                foreach($puntuaciones as $puntuacion){
                                            ?>
                                                    <option value="<?= $puntuacion["valor"]?>"><?= utf8_encode($puntuacion["nombre"]);?></option>
                                            <?php 
                                                }
                                            ?>
            </select>
        </td>
        <?php
         }
        if ($estado==7){
            //consultar que puntuacion es
                 $puntuacionesss = "SELECT * FROM puntuaciones  where valor='".$objetivo["valor_consenso"]."'";
                 $puntuacioness = $oGlobals->verPorConsultaPor($puntuacionesss, 0);
                 $nombre_puntuacion=$puntuacioness['nombre'];
        ?>
        <td style="width: 20%;">
        <?=$nombre_puntuacion;?>
        </td>
        <?php
        }
        ?>
            </tr>
            <?php $num=$num+1;} ?>
        </tbody>
    </table>
    <br />
                        
    <div id="rsp-frm-crear-objetivo"></div>
    <div class="panel-footer text-right" style="background: none !important;">
    <button class="btn btn-danger" type="button" onClick="location.href='../evaluaciones/evaluaciones.html'">Volver</button>
    <?php
    if ($objetivo["cerrado"]<7){
    ?>
    <button class="btn btn-danger" type="submit">Guardar cambios</button>
    <?php
    }
    ?>

</div>