<div class="page-header">
    <h1>
        <span class="text-light-gray">CONFIGURACIÓN / </span>
        Nuevo rol
    </h1>
</div> 

<form id="frm-crear-rol" name="frm-crear-rol" class="form_sdv panel form-horizontal" action="../process/config/crear-rol.php" method="post">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <label class="control-label">Nombre rol</label>
                <input type="text" id="rol" name="rol" class="form-control form-group-margin">
            </div>

        </div>


    </div>
    
    <div id="rsp-frm-crear-rol"></div>
    
    <div class="panel-footer text-right">
        <button class="btn btn-primary"  type="button" onClick="location.href='../configuracion/roles.html'">Volver</button>
		<button class="btn btn-primary" type="submit">Crear rol</button>
    </div>
</form>

    
