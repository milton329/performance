<div class="page-header">
    <div class="col-md-4 text-xs-center text-md-left text-nowrap">
      <h1>
        <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-money"></i> Administrativo / Cartera /</span>
        Consultar documentos
      </h1>
    </div>
</div> 

<div class="panel">
  <div class="panel-body">
    <div class="table-primary">
        
        <form id="frm-consultar-documentos" name="frm-consultar-documentos" class="form_sdv form-horizontal" method="post" action="../process/tercero/consultar-documentos-cartera.php">

                <input type="hidden" value="RC" id="tipo_documento" name="tipo_documento"/>

            <div class="col-md-4">
                <label class="control-label">Cliente</label>
                <input id="text_cliente" name="cliente" class="form-control form-group-margin" />
            </div>

            <div class="col-md-2">
                <label class="control-label">Documento</label>
                <input id="documento__" name="documento" class="form-control form-group-margin" />
            </div>

            <div class="col-md-2">
                <label class="control-label">Fecha inicial</label>
                <input readonly id="fecha_inicial" name="fecha_inicial" class="fechaIn form-control form-group-margin" />
            </div>
            
            <div class="col-md-2">
                <label class="control-label">Fecha final</label>
                <input readonly id="fecha_final" name="fecha_final" class="fechaIn form-control form-group-margin" />
            </div>
            
        
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



    

 

