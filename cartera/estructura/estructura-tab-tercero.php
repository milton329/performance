

    <br style="clear: both;"/>
    
    <ul class="nav nav-lg nav-tabs nav-tabs-simple" id="profile-tabs">
        <li class="active"><a href="#rsp-div-opc-asdf" onClick="Funciones.cargar_tab('<?= $codigo;?>', 'cliente', 'rsp-div-opc-asdf');" data-toggle="tab" role="tab">Info. cliente </a></li>
    </ul>

    <div class="tab-content p-y-0">
      <div class="tab-content panel table-primary ">
        <div class="active panel-body tab-pane" id="rsp-div-opc-asdf" role="tabpanel">
          <?php include '../../cartera/frm/frm-cliente.php'; ?>   
        </div>
      </div>
    </div>





