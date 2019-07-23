<div class="page-header">
    <h1>
        <span class="text-light-gray">CONFIGURACIÓN / </span>
        Nuevo módulo
    </h1>
</div> 

<form id="frm-crear-modulo" name="frm-crear-modulo" class="form_sdv panel form-horizontal" method="post" action="../process/config/crear-modulo.php">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <label class="control-label">Nombre módulo</label>
                <input type="text" id="modulo" name="modulo" class="form-control form-group-margin">
            </div>
            
            <div class="col-md-6">
                <label class="control-label">Icono</label>
                <input type="text" id="icono" name="icono" class="form-control form-group-margin">
            </div>

        </div>

		<div class="row">
            <div class="col-md-6">
                <label class="control-label">Mostrar en pantalla principal</label>
                <select class="form-control form-group-margin" id="principal" name="principal">
					<option value="1">Si</option>
                    <option value="0" selected="selected">No</option>
                </select>
            </div>
            
            <div class="col-md-6">
                <label class="control-label">Orden del menú</label>
                <input type="text" id="orden" name="orden" class="form-control form-group-margin">
            </div>

        </div>
        
    </div>

    <div id="rsp-frm-crear-modulo"></div>
    
    <div class="panel-footer text-right">
        <button class="btn btn-primary"  type="button" onClick="location.href='../configuracion/'">Volver</button>
		<button class="btn btn-primary" type="submit">Crear módulo</button>
    </div>
</form>

    
