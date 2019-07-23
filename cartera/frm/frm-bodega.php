


<form class="form_sdv" action="../process/utilidad/accion-bodega.php" method="post" id="frm-ficha-bodega">

	<div id="rsp-frm-ficha-bodega"></div>

    <div class="text-right">
        <button class="btn-delete-cliente btn btn-primary" type="button" id="<?= $tercero["id"];?>"><i class="fa fa-trash"></i></button>
        <button class="btn btn-primary" type="submit"><i class="fa fa-floppy-o"></i></button>
        
        <input id="id" name="id" type="hidden" class="form-control form-group-margin" >
    </div>
    
    
    <div class="row">
    
    	<div class="col-md-3">
            <img src="../resources/images/foto.jpg" class="img-circle" />
        </div>
    
        <div class="col-md-9">
        
            <div class="row">
                <div class="col-md-6">
                    <label class="control-label">Nombre</label>
                    <input id="nombre" name="nombre" type="text" class="form-control form-group-margin" >
                </div>
                
                <div class="col-md-6">
                    <label class="control-label">Apellido</label>
                    <input id="apellido" name="apellido" type="text" class="form-control form-group-margin" >
                </div>
            </div>
            
             <div class="row">
                <div class="col-md-12">
                    <label class="control-label">Razón social</label>
                    <input id="razon_social" name="razon_social" type="text" class="form-control form-group-margin" >
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <label class="control-label">Código</label>
                    <input id="codigo" name="codigo" type="text" class="form-control form-group-margin" readonly="">
                </div>
                
                <div class="col-md-6">
                    <label class="control-label">Identifiación</label>
                    <input id="identificacion" name="identificacion" type="text" class="form-control form-group-margin" >
                </div>
            </div>

            <div class="row">
    
                <div class="col-md-6">
                    <label class="control-label">Dirección</label>
                    <input id="direccion" name="direccion" type="text" class="form-control form-group-margin" >
                </div>
                        
                <div class="col-md-6">
                    <label class="control-label">Ciudad:</label>          
                    <input class="form-control form-group-margin" name="ciudad" id="txt_ciudad">
                </div>

            </div>

            <div class="row">

                <div class="col-md-4">
                    <label class="control-label">E-mail</label>
                    <input id="email" name="email" type="text" class="form-control form-group-margin" >
                </div>
            
                <div class="col-md-4">
                    <label class="control-label">Teléfono</label>
                    <input id="telefono" name="telefono" type="text" class="form-control form-group-margin" >
                </div>

                <div class="col-md-4">
                    <label class="control-label">Móvil</label>
                    <input id="movil" name="movil" type="text" class="form-control form-group-margin" >
                </div>

            </div>

    </div>
    
    <div class="row">

        <div class="col-md-4">
            <label class="control-label">Cupo</label>
            <input id="cupo" name="cupo" type="text" class="form-control form-group-margin" >
        </div>
        
        <div class="col-md-3">
            <label class="control-label">Lista</label>            
            <select id="id_lista_precio" name="id_lista_precio" class="form-control form-group-margin" >
                <option value="0">Seleccione</option>
                <?php $grupos = $oGlobals->verOpcionesPor("precios_lista", "", 1);
                      foreach($grupos as $grupo){
                ?>	
                            <option value="<?= $grupo[1]?>"><?= utf8_encode($grupo[2]);?></option>		
                <?php }?>
            </select>
            
        </div>
        
        <div class="col-md-3" style="display: none">
            <label class="control-label">Tipo</label>
            <input id="id_tipo" name="id_tipo" type="text" class="form-control form-group-margin" value="0" >
        </div>
        
		<?php if($_SESSION["rol"] == 1){?>
        <div class="col-md-2">
            <label class="control-label">Venta cartera v.</label>
            <select id="venta_con_cartera_v" name="venta_con_cartera_v" class="form-control form-group-margin" >
                <option value="0">No</option>
             	<option value="1">Si</option>		

            </select>
        </div>
        <?php }?>

        <div class="col-md-2">
            <label class="control-label">Proveedor</label>
            <select id="proveedor" name="proveedor" class="form-control form-group-margin" >
                <option value="0">No</option>
                <option value="1">Si</option>       

            </select>
        </div>
        
        <div class="col-md-3">
            <label class="control-label">Fecha creación</label>
            <input id="fecha_creacion" name="fecha_cre" type="text" class="form-control form-group-margin" readonly >
        </div>

        <div class="col-md-3">
            <label class="control-label">Empresa</label>
            <select class="form-control form-group-margin" id="id_empresa" name="id_empresa">
                <option value="">Seleccione</option>
                <?php 
                    $empresas = $oGlobals->verOpcionesPor("empresas", "", 1);
                    foreach ($empresas as $empresa) {
                ?>
                        <option value="<?= $empresa["id"];?>"><?= $empresa["nombre_empresa"];?></option>
                <?php
                    }
                ?>
            </select>
        </div>
 
    </div>

    <br style="clear: both;">
    
    <div class="text-right">
        <button class="btn-delete-cliente btn btn-primary" type="button" id="<?= $tercero["id"];?>"><i class="fa fa-trash"></i></button>
        <button class="btn btn-primary" type="submit"><i class="fa fa-floppy-o"></i></button>
    </div>

</form>

<?php 

    if($tercero != 2) {

                    
        echo "<script>";
        foreach($tercero as $key => $data){
            
            echo "$('#".$key."').val('".utf8_encode($data)."');";

        }
            echo "$('#txt_ciudad').val('".utf8_encode($tercero["ciudad"])."');";        
        echo "</script>"; 
    }
?>
