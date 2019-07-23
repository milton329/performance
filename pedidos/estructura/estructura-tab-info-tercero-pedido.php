
<div class="panel">
      <div class="panel-body p-a-4 b-b-4 bg-white ">
        <div class="box m-a-0 border-radius-0 bg-white ">
          <div class="box-row valign-middle">

            <div class="box-cell col-md-8">
              <div class="display-inline-block px-demo-brand px-demo-brand-lg valign-middle">
                <span class="px-demo-logo m-y-0 m-r-2 bg-primary"><span class="px-demo-logo-1"></span><span class="px-demo-logo-2"></span><span class="px-demo-logo-3"></span><span class="px-demo-logo-4"></span><span class="px-demo-logo-5"></span><span class="px-demo-logo-6"></span><span class="px-demo-logo-7"></span><span class="px-demo-logo-8"></span><span class="px-demo-logo-9"></span></span>
              </div>

              <div class="display-inline-block m-r-3 valign-middle">
                <div class="font-size-18 font-weight-bold line-height-1"><strong>PEDIDO</strong></div>
              </div>

              <!-- Spacer -->
              <div class="m-t-3 visible-xs visible-sm"></div>

              <div class="display-inline-block p-l-1 b-l-3 valign-middle font-size-12 text-muted">
                <div></div>
                <div></div>
              </div>

            </div>

            <!-- Spacer -->
            <div class="m-t-3 visible-xs visible-sm"></div>

            <div class="box-cell col-md-4">
              <div class="pull-md-right font-size-15">
                <div class="text-muted font-size-13 line-height-1"><strong>Fecha</strong></div>
                <strong><?= $oGlobals->fecha(date("Y-m-d"));?></strong>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="panel-body p-a-4 bg-white b-b-2">
        <div class="box m-a-0 border-radius-0">
          <div class="box-row valign-middle">
            <div class="box-cell col-md-6 font-size-14">
              <div class="font-size-18 font-weight-bold line-height-1"><strong><?= $tercero["codigo"];?></strong></div>
              <div class="font-size-18 font-weight-bold line-height-1"><strong><?= utf8_encode($tercero["nombre"]." ".$tercero["apellido"]);?></strong></div>
            </div>

            <!-- Spacer -->
            <div class="m-t-3 visible-xs visible-sm"></div>

            <div class="box-cell col-md-6 bg-white darken p-x-3 p-y-2">
              <div class="pull-xs-left m-y-1 font-size-12 text-muted"><strong>Cupo:</strong></div>
              <div class="pull-xs-right font-size-24"><strong id="fact">$<?= number_format($tercero["cupo"] - $cupoUsa["cupo_usado"] - $cupoUsaFac["cupo_usado_cartera"], 0, "", ".");?></strong></div>
            </div>
          </div>
        </div>

        <br style="clear: both;">
        <div class="box-cell col-md-12 font-size-14">
          <div><?= "";//utf8_encode($documento["obs"]);?></div>
        </div>
      </div>


      	<?php 
			if($tercero["cupo"] <= 0 && $_SESSION['rol'] == 1) {
				echo "<h2 class='msg_error'>Este cliente NO tiene cupo para realizar pedidos <br /> <a href='#up_cupo' id='".$tercero["id"]."' class='btn_up_cupo' data-toggle='modal'>Da clic para asignar cupo</a></h2>"; 
				echo '<div class="modal fade" id="up_cupo" role="dialog"></div>';
				return;
			}
			else if($tercero["cupo"] <= 0) {
				
				echo "<h2 class='msg_error'>Este cliente NO tiene cupo para realizar pedidos, comunicate con la empresa para asignar el cupo</h2>"; 
				return;
			}
			
			if($tercero["venta_con_cartera_v"] == 0){
			
				if($cupoUsaFac["dias"] > 15) {
					
					echo "<h2 class='msg_error'>Este cliente tiene cartera vencida por ".$cupoUsaFac["dias"]." días </h2>"; 
					return;
				}
			}
			
		?>

      <ul class="nav nav-lg nav-tabs nav-tabs-simple" id="profile-tabs">
        <li class="active"><a href="#rsp-div-opc-asdf" onClick="Funciones.cargar_tab('1', '5', 'rsp-div-opc-asdf');" data-toggle="tab" role="tab">Pedido </a></li>
        <li><a href="#rsp-div-opc-asdf" onClick="Funciones.cargar_tab('1', '6', 'rsp-div-opc-asdf');" data-toggle="tab" role="tab">Resumen</a></li>
	  </ul>

	  <div class="panel-body p-a-4" id="rsp-div-opc-asdf">

      	<?php include '../../pedidos/estructura/estructura-tab-info-producto-pedido.php';;?>

      	<br style="clear: both;">

      </div>

		<br style="clear: both;">
		<br style="clear: both;">
		<br style="clear: both;">
		<br style="clear: both;">
		<br style="clear: both;">
		<br style="clear: both;">
		<br style="clear: both;">
		<br style="clear: both;">
		<br style="clear: both;">
		<br style="clear: both;">
		<br style="clear: both;">
		<br style="clear: both;">
		<br style="clear: both;">
		<br style="clear: both;">
		<br style="clear: both;">
		<br style="clear: both;">