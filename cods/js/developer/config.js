$(document).ready(function(event){	


	$('.btnCrearMenuModulo').live('click' ,(function(event){
			

			$('#divVerMenuModulo').slideUp();
			$('#divNuevoMenuModulo').slideToggle();
	}));
	        	
	$('#frmCrearModulo').live('submit' ,(function(event){
	
			event.preventDefault();
			
			var modulo      = $('#modulo').val();
			var icono  		= $('#icono').val();
			var principal   = $('#principal').val();
			var orden  		= $('#orden').val();

			$('.inpBott').fadeOut();
			$('#load').fadeIn();
			


			$.post("../process/config/crear-modulo.php",{ modulo: modulo, icono: icono, principal: principal, orden: orden
					},
				function(data){	
				
					
					$('#rspGrupo').fadeOut();	
					$("#rspGrupo").html(data);
					$('#load').fadeOut();
					$('.inpBott').fadeIn();
					$('#rspGrupo').fadeIn();
					
				}
			)
		}
	));	
	
	
	
	$('#frmEditarModulo').live('submit' ,(function(event){
	
			event.preventDefault();
			
			var modulo      = $('#modulo').val();
			var icono  		= $('#icono').val();
			var principal   = $('#principal').val();
			var orden  		= $('#orden').val();
			var id  		= $('#id').val();

			$('.inpBott').fadeOut();
			$('#load').fadeIn();

			$.post("../process/config/editar-modulo.php",{ modulo: modulo, icono: icono, principal: principal, orden: orden, id: id 
					},
				function(data){	
				
					
					$('#rspModEdi').fadeOut();	
					$("#rspModEdi").html(data);
					$('#load').fadeOut();
					$('.inpBott').fadeIn();
					$('#rspModEdi').fadeIn();
					
				}
			)
		}
	));
	
	
	
	$('.btnEditarModulo').live('click' ,(function(event){
			
			
			var id = $(this).attr("id");
		
			$.post("../configuracion/editar/editar-modulo.php",{ id: id},
		
			function(data){	
				
				$('#divModulos').slideUp();
				$('#divEditarModulos').html(data); 
				$('#divEditarModulos').slideToggle();
		
				} 
				
			)}	
			
	));
	
	
	$('#frmCrearMenuModulo').live('submit' ,(function(event){

			event.preventDefault();
		
			var opcion 			= $('#opcion').val();
			var directorio 		= $('#directorio').val();
			var enlace 			= $('#enlace').val();
			var archivo 		= $('#archivo').val();
			var mostrar_menu 	= $('#mostrar_menu').val();
			var icono 			= $('#icono').val();
			var id_modulo 		= $('#id_modulo').val();
			var opcionTabla 	= $('#opcionTabla').val();
			var mensajeOpcion 	= $('#mensajeOpcion').val();
			var tabla		 	= $('#tabla').val();
			
			
			$('.inpBott').fadeOut()
			$('#load').fadeIn()
			
			$.post("../process/config/crear-menu-modulo.php",{ opcion: opcion, directorio: directorio, enlace: enlace, archivo: archivo, mostrar_menu: mostrar_menu,
															   icono: icono, id_modulo: id_modulo, opcionTabla: opcionTabla, mensajeOpcion: mensajeOpcion, tabla: tabla},
			
			function(data){	
			
				$('#rspMenuModulo').fadeOut();	
				$('#rspMenuModulo').html(data); 
				$('#load').fadeOut(); 
				$('.inpBott').fadeIn(); 
				$('#rspMenuModulo').fadeIn(); 
			} 
		
		)}
	))
	
	$('#frmEditarMenuModulo').live('submit' ,(function(event){

			event.preventDefault();
			
			$('#divNuevoMenuModulo').html("")
		
			var opcion 			= $('#opcion').val();
			var directorio 		= $('#directorio').val();
			var enlace 			= $('#enlace').val();
			var archivo 		= $('#archivo').val();
			var mostrar_menu 	= $('#mostrar_menu').val();
			var icono 			= $('#icono').val();
			var id_modulo 		= $('#id_modulo').val();
			var opcionTabla 	= $('#opcionTabla').val();
			var mensajeOpcion 	= $('#mensajeOpcion').val();
			var tabla		 	= $('#tabla').val();
			var id 				= $('#id').val();
			
			$('.inpBott').fadeOut()
			$('#load').fadeIn()
			
			
			
			$.post("../process/config/editar-menu-modulo.php",{ opcion: opcion, directorio: directorio, enlace: enlace, archivo: archivo, mostrar_menu: mostrar_menu, icono: icono, 
			id_modulo: id_modulo,  opcionTabla: opcionTabla, mensajeOpcion: mensajeOpcion, tabla: tabla, id: id},
			
			function(data){	
			
				$('#rspMenuModuloEd').fadeOut();	
				$('#rspMenuModuloEd').html(data); 
				$('#load').fadeOut(); 
				$('.inpBott').fadeIn(); 
				$('#rspMenuModuloEd').fadeIn(); 
			} 
		
		)}
	))
		
	$('.btnEditarMenuModulo').live('click' ,(function(event){
			
			
			var id = $(this).attr("id");
			
			$.post("../configuracion/editar/editar-menu-modulo.php",{ id: id},
		
			function(data){	
				
				$('#divVerMenuModulo').slideUp();
				$('#divEditarMenuModulo').html(data); 
				$('#divEditarMenuModulo').slideToggle();
		
				} 
				
			)}	
			
	));	


	$('.btnEditarRol').live('click' ,(function(event){
			
			
			var id = $(this).attr("id");
		
			$.post("../configuracion/editar/editar-rol.php",{ id: id},
		
			function(data){	
				
				$('#divRoles').slideUp();
				$('#divEditarRoles').html(data); 
				$('#divEditarRoles').slideToggle();
		
				} 
				
			)}	
			
	));
	
	$('#frmCrearRol').live('submit' ,(function(event){

			event.preventDefault();
		
			var rol 			= $('#rol').val();
			
			$('.inpBott').fadeOut()
			$('#load').fadeIn()
			
			$.post("../process/config/crear-rol.php",{ rol: rol},
			
			function(data){	
			
				$('#rspRol').fadeOut();	
				$('#rspRol').html(data); 
				$('#load').fadeOut(); 
				$('.inpBott').fadeIn(); 
				$('#rspRol').fadeIn(); 
			} 
		
		)}
	))
	
	
	$('#frmEditarRol').live('submit' ,(function(event){

			event.preventDefault();
		
			var rol	= $('#rol').val();
			var id 	= $('#id').val();
			
			$('.inpBott').fadeOut()
			$('#load').fadeIn()
			
			$.post("../process/config/editar-rol.php",{ rol: rol, id : id},
			
			function(data){	
			
				$('#rspRolEd').fadeOut();	
				$('#rspRolEd').html(data); 
				$('#load').fadeOut(); 
				$('.inpBott').fadeIn(); 
				$('#rspRolEd').fadeIn(); 
			} 
		
		)}
	))
	
	$('.btnAsignarRolModulo').live('click' ,(function(event){
			
			var id = $(this).attr("id");
			var rol = $('#id').val();
			
			
			if ($('#'+id).prop("checked")){

				$.post("../process/config/crear-modulo-rol.php",{ idModulo: id, rol: rol},
					function(data){	}//$("#rspUs").html(data);
				)
			}else {
				
				$.post("../process/config/eliminar-modulo-rol.php",{ idModulo: id, rol: rol},
					function(data){	}//$("#rspUs").html(data);
				)
			}
		
	}));
	
	
	$('.btnVerOpcioneModulo').live('click' ,(function(event){
			
			
			event.preventDefault();
			var palabra = $(this).attr("id");
			var rol = $('#id').val();
			
			var id = palabra.split("_");
			
			var idModulo = id[1];
			
			$.post("../process/config/ver-menu-modulo.php",{ idModulo: idModulo, rol: rol},
				function(data){	
				
					$("#divElegirOpcionesModulo").html(data);
					
				}//
			)

	}));
	
	$('.btnMenuRol').live('click' ,(function(event){
			
			var palabra = $(this).attr("id");
			var id = palabra.split("_");
			var idMenu = id[1];
			var rol = id[2];
			
			
			if ($('#'+palabra).prop("checked")){
				
				$.post("../process/config/crear-menu-modulo-rol.php",{ idMenu: idMenu, rol : rol},
					function(data){	}//$("#rspUs").html(data);
				)
			}else {
				
				$.post("../process/config/eliminar-menu-modulo-rol.php",{ idMenu: idMenu, rol : rol},
					function(data){	}//$("#rspUs").html(data);
				)
			}
		
	}));
	
	$('.btnAsignarRolLugar').live('click' ,(function(event){
			
			
			
			
			var palabra = $(this).attr("id");
			var id = palabra.split("_");
			
			var id = id[1];
			var rol = $('#id').val();
		
			
			if ($('#'+palabra).prop("checked")){

				$.post("../process/config/crear-rol-lugar.php",{ idLugar: id, rol: rol},
					function(data){ $("#rspUs").html(data);}//
				)
			}else {
				
				$.post("../process/config/eliminar-rol-lugar.php",{ idLugar: id, rol: rol},
					function(data){	}//$("#rspUs").html(data);
				)
			}
		
	}));
	
	
	
	$('.btn_delte_menu_modulo').live('click' ,(function(event){
		
		event.preventDefault();
			
		if(confirm('¿Deseas la opción del menú?')) { 	
			
			var id = $(this).attr("id");
			
			$.post("../process/config/eliminar-menu-modulo.php",{ id: id},
				function(data){	
						
						$("#tr"+id).fadeOut(); 
				}
			)
		}
	}));
	

		 
})