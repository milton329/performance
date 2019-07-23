<div class="page-header">
    <div class="col-md-4 text-xs-center text-md-left text-nowrap">
      <h1>
        <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-money"></i> Cartera /</span>
        Consultar cartera
      </h1>
    </div>
</div> 

<div class="panel">
  <div class="panel-body">
    <div class="table-primary">
        
        <form id="frm-consultar-documentos" name="frm-consultar-documentos" class="form_sdv form-horizontal" method="post" action="../process/tercero/consultar-cartera.php">

                <input type="hidden" id="cliente_id" name="cliente_id">

            <div class="col-md-4">
                <label class="control-label">Cliente</label>
                <input id="text_cliente" name="usuario" class="form-control form-group-margin" />
            </div> 

            <div class="col-md-2">
                <label class="control-label">Total</label>
                <select id="total" name="total" class="form-control form-group-margin" >
                    <option value="">Seleccione</option>
                    <option value="1">Cartera total</option>
                </select>
            </div>   

            <div class="col-md-2">
                <label class="control-label">Categoría</label>
                <select type="text" id="categoria" name="categoria" class="form-control form-group-margin">
                    <option value="">Seleccione</option>    
                    <?php 
                        $categorias = $oGlobals->verOpcionesPor("categorias", $con_emp, 1);
                        foreach ($categorias as $categoria) {
                    ?>
                            <option value="<?= $categoria["id"];?>"><?= utf8_encode($categoria["categoria"]);?></option>
                    <?php
                        }
                    ?>
                </select>
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
                <button type="submit" style="border: none; background: #FFF; margin-top: 22px; font-size: 20px;"><i class="fa fa-search" aria-hidden="true"></i></button> 
            </div>
            
        </form>
        
        <br style="clear: both" />
        <br style="clear: both" />
        
        <div id="rsp-frm-consultar-documentos"></div>
    
        
      
    </div>
  </div>
</div>



    

 

