	<div class="page-header">
        <div class="col-md-4 text-xs-center text-md-left text-nowrap">
          <h1>
          	<span class="text-muted font-weight-light"><i class="page-header-icon fa fa-file-o"></i>Pedidos / </span>
            Nuevo pedido
          </h1>
        </div>
    </div> 
    


	<form action="../process/pedido/consultar-pedido-info-cliente.php" id="frm-compra" name="frm-compra" method="post"  class="form_sdv form-horizontal" enctype="multipart/form-data"> 

			<div class="row">

				<div class="col-md-4">
                <input id="text_cliente" name="text_cliente" type="text" class=" form-control form-group-margin" placeholder="Ingrese el cliente">
            </div>
       
            <div class="col-md-1">
                <button type="submit" style="border: none; background: none;  font-size: 20px;"><i class="fa fa-search" aria-hidden="true"></i></button> 
            </div>
        
    	</div>
        
        <br />
	</form>       

	<br style="clear:both;" />

	<div id="rsp-frm-compra"></div>

	