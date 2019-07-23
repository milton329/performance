<?php
    if(!isset($_SESSION["ped_pos"])){
        $_SESSION["ped_pos"] = "";
    }

    $sql   = "SELECT *  FROM mov_pedido WHERE documento = '".$_SESSION["ped_pos"]."'";
    $tercero = $oGlobals->verPorConsultaPor($sql, 0); 

    if ($tercero["cliente_nombre"]!= ""){

?>
<div class="tab bBS1 p10">
  <br>
        <table>
                        <tr>
                            <td>
                                 &nbsp;&nbsp;Identificacion:
                            </td>
                            <td>
                                 &nbsp;&nbsp;<strong><?= $tercero["cliente_identificacion"];?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                  &nbsp;&nbsp;Nombre y Apellido: 
                            </td>
                            <td>
                                 &nbsp;&nbsp;<strong><?= $tercero["cliente_nombre"];?></strong>
                            </td>
                        </tr>                        
</table>
</div>
<?php
}

?>

    