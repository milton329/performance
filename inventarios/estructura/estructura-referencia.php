
    <br style="clear: both;"/>
    
    <ul class="nav nav-lg nav-tabs nav-tabs-simple" id="profile-tabs">
        
        <li class="active"><a href="#rsp-div-opc-asdf" onClick="Funciones.cargar_tab('<?= $id;?>', 'referencia', 'rsp-div-opc-asdf');" data-toggle="tab" role="tab">Info. Referencia </a></li>
        <li><a href="#rsp-div-opc-asdf" onClick="Funciones.cargar_tab('<?= $id;?>', 'referencia_precios', 'rsp-div-opc-asdf');" data-toggle="tab" role="tab">Precios</a></li>
        <li><a href="#rsp-div-opc-asdf" onClick="Funciones.cargar_tab('<?= $id;?>', 'referencia_unidades', 'rsp-div-opc-asdf');" data-toggle="tab" role="tab">Unidades</a></li>
        <li><a href="#rsp-div-opc-asdf" onClick="Funciones.cargar_tab('<?= $id;?>', 'referencia_entradas', 'rsp-div-opc-asdf');" data-toggle="tab" role="tab">Entradas</a></li>
        <li><a href="#rsp-div-opc-asdf" onClick="Funciones.cargar_tab('<?= $id;?>', 'referencia_salidas', 'rsp-div-opc-asdf');" data-toggle="tab" role="tab">Salidas</a></li>
        <li><a href="#rsp-div-opc-asdf" onClick="Funciones.cargar_tab('<?= $id;?>', 'referencia_pedidos', 'rsp-div-opc-asdf');" data-toggle="tab" role="tab">Pedidos</a></li>
        <li><a href="#rsp-div-opc-asdf" onClick="Funciones.cargar_tab('<?= $id;?>', 'referencia_fotos', 'rsp-div-opc-asdf');" data-toggle="tab" role="tab">Fotos</a></li>
		<li><a href="#rsp-div-opc-asdf" onClick="Funciones.cargar_tab('<?= $id;?>', 'referencia_cod-barras', 'rsp-div-opc-asdf');" data-toggle="tab" role="tab">Cod Barras</a></li>
    </ul>

    <div class="tab-content p-y-0">
      <div class="tab-content panel table-primary ">
        <div class="active panel-body tab-pane" id="rsp-div-opc-asdf" role="tabpanel">
          <?php include '../../inventarios/frm/frm-referencia.php'; ?>   
        </div>
      </div>
    </div>

