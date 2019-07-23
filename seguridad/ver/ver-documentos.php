 <?php 

    if($action == "documentos-entrada") { $tipo = 1; $docs = 1; $titulo = "de entrada";}
    if($action == "documentos-salida")  { $tipo = 2; $docs = 0; $titulo = "de salida";}

?>


<div class="page-header">
    <div class="col-md-4 text-xs-center text-md-left text-nowrap">
      <h1>
        <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-unlock-alt"></i>Seguridad /</span>
        Ver documentos <?= $titulo;?>
      </h1>
    </div>
</div>

<div class="panel">
  <div class="panel-body">
    <div class="table-primary">

        <form id="frm-consultar-documentos" name="frm-consultar-documentos" class="form_sdv form-horizontal" method="post" action="../process/documento/consultar-documentos.php">

            <input type="hidden" name="seguridad" id="seguridad" value="1">
            <input type="hidden" name="tipo"      id="tipo" value="<?= $tipo;?>">
            <input type="hidden" name="cliente"   id="cliente" value="">
            
            <div class="col-md-2">
                <label class="control-label">Documento</label>
                <input id="documento__" name="documento" class="form-control form-group-margin" />
            </div>

            <div class="col-md-2">
                <label class="control-label">Tipo documento</label>
                <select id="tipo_documento" name="tipo_documento" class="form-control form-group-margin">
                    <option value="">Seleccione</option>
                    <?php 
                        $tipos = $oGlobals->verOpcionesPor("tipos_documentos", " AND naturaleza IN (".$docs.") AND modulo = 1 AND inactivo = 0", 1);
                        foreach ($tipos as $tipo) {
                    ?>
                            <option value="<?= $tipo["codigo"];?>"><?= utf8_encode($tipo["tipo_documento"]);?></option>    
                    <?php
                        }
                    ?>
                </select>
            </div>

            <div class="col-md-2">
                <label class="control-label">Fecha inicial</label>
                <input readonly id="fecha_inicial" name="fecha_inicial" class="fechaIn form-control form-group-margin" />
            </div>
            
            <div class="col-md-2">
                <label class="control-label">Fecha final</label>
                <input readonly id="fecha_final" name="fecha_final" class="fechaIn form-control form-group-margin" />
            </div>

            <?php if($_SESSION["tipo_rol"] == 1){?>
                <div class="col-md-2">
                    <label class="control-label">Empresa</label>
                    <select class="form-control form-group-margin" id="id_empresa" name="id_empresa">
                        <option value="">Seleccione</option>
                        <?php 
                            $empresas = $oGlobals->verOpcionesPor("empresas", $con_empresa, 1);
                            foreach ($empresas as $empresa) {
                        ?>
                                <option value="<?= $empresa["id"];?>"><?= $empresa["nombre_empresa"];?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            <?php }?>
            
        
            <div class="col-md-1">
                <button type="submit" style="border: none; background: #FFF; margin-top: 22px; font-size: 20px;"><i class="fa fa-play" aria-hidden="true"></i></button> 
            </div>
            
        </form>
        
        <br style="clear: both" />
        <br style="clear: both" />
        
        <div id="rsp-frm-consultar-documentos"></div>
    
        
      
    </div>
  </div>
</div>



    

 

