		
	<div class="page-header">
        <div class="col-md-4 text-xs-center text-md-left text-nowrap">
          <h1>
            <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-cube"></i>Inventarios / </span>
            Ficha referencia
          </h1>
        </div>
    </div>

    <form method="post" class="form_sdv" action="../process/inventario/consultar-referencia.php" id="frm-consulta-referencia">

        <input type="hidden" name="vari" id="vari" value="1">
        
        <div class="row">
            <div class="col-md-4">
                <input id="txt_producto" name="ref" type="text" class="form-control form-group-margin" >
            </div>
            
            <div class="col-md-2">
                <button class="btn btn-primary" type="submit">Consultar</button>
            </div>
            
        </div>

    </form>
    
   	<div id="rsp-frm-consulta-referencia"></div>   
    		
