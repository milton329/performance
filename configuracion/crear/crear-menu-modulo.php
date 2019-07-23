<div class="page-header">
    <h1>
        <span class="text-light-black">Nuevo menú módulo </span>
    </h1>
</div>

<form id="frm-crear-menu-modulo" name="frm-crear-menu-modulo" class="form_sdv panel form-horizontal" method="post" action="../process/config/crear-menu-modulo.php">

    <div class="panel-body">
    
        <div class="row">
            <div class="col-md-6">
            
            
            	<input type="hidden" id="id_modulo" name="id_modulo" class="form-control form-group-margin" value="<?php echo utf8_encode($modulo["id"])?>">
                
                <label class="control-label">Menú módulo</label>
                <input type="text" id="opcion" name="opcion" class="form-control form-group-margin">
            </div>
            
            <div class="col-md-6">
                <label class="control-label">Directorio</label>
                <input type="text" id="directorio" name="directorio" class="form-control form-group-margin">
            </div>

        </div>
        
        <div class="row">
            <div class="col-md-3">
                <label class="control-label">Enlace</label>
                <input type="text" id="enlace" name="enlace" class="form-control form-group-margin">
            </div>
            
            <div class="col-md-3">
                <label class="control-label">Archivo</label>
                <input type="text" id="archivo" name="archivo" class="form-control form-group-margin">
            </div>
            
            <div class="col-md-3">
                <label class="control-label">Icono</label>
                <input type="text" id="icono" name="icono" class="form-control form-group-margin">
            </div>
            
            <div class="col-md-3">
                <label class="control-label">Mostrar en menú</label>
                <select class="form-control form-group-margin" id="mostrar_menu" name="mostrar_menu">
					<option value="1">Si</option>
                    <option value="0">No</option>
                </select>
                
            </div>

        </div>
        
        <div class="row">
            <div class="col-md-4">
                <label class="control-label">Mostrar opción en tabla</label>
                <select class="form-control form-group-margin" id="opcionTabla" name="opcionTabla">
					<option value="1">Si</option>
                    <option value="0">No</option>
                </select>
                
            </div>
            
            <div class="col-md-4">
                <label class="control-label">Mensaje opción</label>
                <input type="text" id="mensajeOpcion" class="form-control form-group-margin" name="mensajeOpcion">
            </div>
            
            <div class="col-md-4">
                <label class="control-label">Tabla para mostrar</label>
                <input type="text" id="tabla" class="form-control form-group-margin" name="tabla">
            </div>

        </div>

    </div>
    
    <div id="rsp-frm-crear-menu-modulo"></div>
    
    <div class="panel-footer text-right">
        <button class="btn btn-primary"  type="button" onClick="location.href='../configuracion/ver-menu-opciones_<?php echo $oGlobals->urls(utf8_encode($modulo["modulo"]))."_".$modulo["id"]?>.html'">Volver</button>
		<button class="btn btn-primary" type="submit">Crear menú</button>
    </div>
</form>

    
