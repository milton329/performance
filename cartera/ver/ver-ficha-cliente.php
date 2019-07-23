		
	<div class="page-header">
        <div class="col-md-4 text-xs-center text-md-left text-nowrap">
          <h1>
            <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-money"></i>Cartera / </span>
            Ficha cliente
          </h1>
        </div>
    </div>

    <form method="post" class="form_sdv" action="../process/tercero/consultar-tercero.php" id="frm-consulta-referencia">

        <div class="row">
            <div class="col-md-4">
                <input id="text_cliente" name="text_cliente" type="text" class="form-control form-group-margin" >
            </div>
            
            <div class="col-md-2">
                <button class="btn btn-primary" type="submit">Consultar</button>
            </div>
            
        </div>

    </form>
    
   	<div id="rsp-frm-consulta-referencia"></div>   
    		
