	
  <script>var pxInit = [];</script>

  <?php if($action != "vender-pos"){?>
  <nav class="px-nav px-nav-left" id="px-demo-nav">
    <button type="button" class="px-nav-toggle" data-toggle="px-nav">
      <span class="px-nav-toggle-arrow"></span>
      <span class="navbar-toggle-icon"></span>
      <span class="px-nav-toggle-label font-size-11">MENÚ</span>
    </button>

    <ul class="px-nav-content">
      <li class="px-nav-box p-a-3 b-b-1" id="demo-px-nav-box">

        
        <div class="font-size-16"><?= utf8_encode($nombre);?></div>
        <!--<div class="btn-group" style="margin-top: 4px;">
          <a href="#" class="btn btn-xs btn-primary btn-outline"><i class="fa fa-envelope"></i></a>
          <a href="#" class="btn btn-xs btn-primary btn-outline"><i class="fa fa-user"></i></a>
          <a href="#" class="btn btn-xs btn-primary btn-outline"><i class="fa fa-cog"></i></a>
          <a href="#" class="btn btn-xs btn-danger btn-outline"><i class="fa fa-power-off"></i></a>
        </div>-->
      </li>
      
      
      <?php 
		
		
			if($action == "menu"){
				
				$tres = $oGlobals->verOpcionesPor("config_modulos_opciones_tres", " AND enlace = '".$url[1]."'", 0);
				
			}
		
		
			$sql = "SELECT cm.id, cm.modulo, cm.orden, cm.icono, cm.directorio
					FROM config_modulos_roles AS cmr
					LEFT JOIN config_modulos AS cm ON cmr.id_modulo = cm.id
					WHERE cmr.id_rol = $rol ORDER BY cm.orden ASC";
			
			$modulos = $oGlobals->verPorConsultaPor($sql, 1);
	  		if($modulos != 2){
				
				foreach($modulos as $modulo){
					
					$id_modulo = $modulo["id"];
					$sql_opc   = "SELECT cmo.*
								  FROM config_modulos_opciones_roles AS cmor
								  LEFT JOIN config_modulos_opciones AS cmo ON cmor.id_modulo_opcion = cmo.id
								  WHERE cmor.id_rol = $rol AND cmor.id_modulo = $id_modulo AND mostrar_menu = 1";
					$opciones  = $oGlobals->verPorConsultaPor($sql_opc, 1);
	  ?>			
					<li class="px-nav-item px-nav-dropdown <?php if($folderDirect == $modulo["directorio"]) echo 'px-open';?>">
                    	<a href=""><i class="px-nav-icon <?= utf8_encode($modulo["icono"]);?>"></i><span class="px-nav-label"><?= utf8_encode($modulo["modulo"]);?></span></a>
                        <?php 
							if($opciones != 2){
	
                        		echo '<ul class="px-nav-dropdown-menu">';
		
										foreach($opciones as $opcion){
											
										   $id_opcion = $opcion["id"];
										   
										   $sql_tr  = "SELECT DISTINCT cmot.*
													   FROM config_modulos_opciones_tres_roles AS cmotr
													   LEFT JOIN config_modulos_opciones_tres AS cmot ON cmotr.id_modulo_opcion_tres = cmot.id
													   WHERE cmotr.id_informe = 0 AND cmotr.id_modulo = $id_modulo AND cmotr.id_modulo_opcion = $id_opcion AND cmotr.id_rol = $rol AND cmot.mostrar_en_menu = 1";
													  
										   $sql_inf = "SELECT DISTINCT inf.*
													   FROM config_modulos_opciones_tres_roles AS cmotr
													   LEFT JOIN informes AS inf ON cmotr.id_informe = inf.id
													   WHERE cmotr.id_modulo_opcion_tres = 0 AND cmotr.id_modulo = $id_modulo AND cmotr.id_modulo_opcion = $id_opcion AND cmotr.id_rol = $rol";			  
										   
										   $opc_tres  = $oGlobals->verPorConsultaPor($sql_tr,  1);
										   $informes  = $oGlobals->verPorConsultaPor($sql_inf, 1);

										   if($opcion["enlace"] != "")  $link = $opcion["directorio"]."/".$opcion["enlace"].".html";
										   else 						$link = $opcion["directorio"]."/";
													
						?>	
                                          <li class="px-nav-item <?php if($id_opcion == $tres["id_opcion"]) echo 'px-open';?> <?php if($opc_tres != 2 || $informes != 2) echo "px-nav-dropdown";?>">
                                            <a href="../<?= $link;?>"><span class="px-nav-label"><?= utf8_encode($opcion["opcion_modulo"]);?></span></a>
                                            <?php if($opc_tres != 2 || $informes != 2){?>
                                                    <ul class="px-nav-dropdown-menu">
                                                    <?php 
														if($opc_tres != 2){
                                                        	foreach($opc_tres as $opc_t){
                                                    ?>
                                                            	<li class="px-nav-item"><a href="../<?= $link."menu_".utf8_encode($opc_t["enlace"]);?>.html"><span class="px-nav-label"><?= utf8_encode($opc_t["modulo_opcion_tres"]);?></span></a></li>	
                                                    <?php	
                                                        	}
														}
														
														if($informes != 2){
															foreach($informes as $opc_inf){
                                                    ?>
                                                    			<li class="px-nav-item"><a href="../informes/informe_<?= $oGlobals->urls(utf8_encode($opc_inf["nombre"]))."_".$opc_inf["id"];?>.html"><span class="px-nav-label"><?= utf8_encode($opc_inf["nombre"]);?></span></a></li>	
                                                    <?php 
															}
														}
													?>
                                                    </ul>
                                            <?php }?>
                                          </li>
                       	<?php 
								}
                        		echo '</ul>';
							}
						?>
                    </li>
      <?php
				}	
			}
	  ?> 
      		
            

                 
    </ul>
  </nav>
  <?php }?>

  <nav class="navbar px-navbar">
    <!-- Header -->
    <div class="navbar-header">
      <a class="navbar-brand px-demo-brand" href="../perfil"><span class="px-demo-logo bg-danger"><span class="px-demo-logo-1"></span><span class="px-demo-logo-2"></span><span class="px-demo-logo-3"></span><span class="px-demo-logo-4"></span><span class="px-demo-logo-5"></span><span class="px-demo-logo-6"></span><span class="px-demo-logo-7"></span><span class="px-demo-logo-8"></span><span class="px-demo-logo-9"></span></span><?= utf8_encode($info_empresa["nombre_empresa"]);?></a>
    </div>


    <!-- Navbar togglers -->
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#px-demo-navbar-collapse" aria-expanded="false"><i class="navbar-toggle-icon"></i></button>

    <div class="collapse navbar-collapse" id="px-demo-navbar-collapse">

      <form class="form_sdv" action="../process/pos/accion-generar-cierre.php" method="post" id="frm-realizar-cierre" name="frm-realizar-cierre">
        <div id="rsp-frm-realizar-cierre"></div>
      </form>

       <!-- DESDE AQUI ESTE ARCHIVO FUE EDITADO POR BRANDON EL 28/04/2019 AÑADIENDO LA ESTRUCTURA NUEVA DE LA CARGA DE PRODUCTOS -->

      <?php if($action == "vender-pos"){?>
      <ul class="nav navbar-nav navbar-left">

      <li class="dropdown">
          <a><i class="page-header-icon fa fa-shopping-basket"></i>SISTEMA POS</a>
      </li>

       <!-- HASTA AQUI ESTE ARCHIVO FUE EDITADO POR BRANDON EL 28/04/2019 AÑADIENDO LA ESTRUCTURA NUEVA DE LA CARGA DE PRODUCTOS -->

      </ul> <?php }?>
      <ul class="nav navbar-nav navbar-right">

        <?php if($action == "vender-pos"){?>

          <li class="dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-shopping-basket m-r-1"></i>Ventas
          </a>
          <ul class="dropdown-menu">
            <li><a href="../pos/menu_consultar-ventas-pos.html">Consultar ventas</a></li>
            <li><a href="../pos/menu_ventas-en-espera-pos.html">Ventas en espera</a></li> 
          </ul>
        </li>
     
        <li class="dropdown" style="background-color:#00b3ff">
          <a href="" class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" onclick="Funciones.realizar_cierre('1', 'frm-realizar-cierre', '1', 'rsp_id');">
            <font color='white'><i class="fa fa-key m-r-1"></i>Cerrar Caja</font>
          </a>
        </li>

        <?php }?>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <img src="../resources/img/user.png" alt="" class="px-navbar-image">
            <span class="hidden-md"><?= utf8_encode($nombre);?></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#">Perfil</a></li>
            <li><a href="#">Cuenta</a></li>
            <li><a href="#"><i class="dropdown-icon fa fa-cog"></i>&nbsp;&nbsp;Configuración</a></li>
            <li class="divider"></li>
            <li><a href="../authorizationOut"><i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;Salir</a></li>
          </ul>
        </li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </nav>

  <script>
    pxInit.push(function() {
      $('#navbar-notifications').perfectScrollbar();
      $('#navbar-messages').perfectScrollbar();
    });
  </script>
  
  <div class="px-content">