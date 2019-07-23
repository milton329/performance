$(document).ready(function(event){	
	  
    $('.fechaIn').live('focus' ,(function(event){
				
		$(this).datepicker({
		
			changeMonth: true,
			changeYear: true,
			format: 'yyyy-mm-dd',
			autoclose: true
		
		});
	
	}));
	
				
	$('.form_sdv').live('submit' ,(function(event){
			 	
		event.preventDefault();
		
		var rsp		 = "rsp-";
		var frm		 = $(this).attr('id');
		
		var bar      = $('.bar');
		var percent  = $('.percent');
		var status   = $('#'+rsp+frm);	
		var progress = $('.progress');
		var msjLoad  = $('.msjLoad');

		$(this).ajaxSubmit({
			
			beforeSend: function() {
				status.empty();
				status.html('<center><img src="../resources/icons/loading.gif" /></center>');
				var percentVal = '0%';
				bar.width(percentVal)
				percent.html(percentVal);
			},
			uploadProgress: function(event, position, total, percentComplete) {
				msjLoad.show(100);
				progress.show(100);
				var percentVal = percentComplete + '%';
				bar.width(percentVal)
				percent.html(percentVal);
				//console.log(percentVal, position, total);
			},
			success: function() {
				var percentVal = '100%';
				bar.width(percentVal)
				percent.html(percentVal);
			},
			complete: function(xhr) {
				status.html(xhr.responseText);
			}
		});
	
	}));
	
	
	$('.form_sdv_login').live('submit' ,(function(event){
			 	
		event.preventDefault();
		
		var rsp		 = "rsp-";
		var frm		 = $(this).attr('id');
		
		var bar      = $('.bar');
		var percent  = $('.percent');
		var status   = $('#'+rsp+frm);	
		var progress = $('.progress');
		var msjLoad  = $('.msjLoad');

		$(this).ajaxSubmit({
			
			beforeSend: function() {
				status.empty();
				status.html('<center><img src="../resources/icons/loading.gif" /></center>');
				var percentVal = '0%';
				bar.width(percentVal)
				percent.html(percentVal);
			},
			uploadProgress: function(event, position, total, percentComplete) {
				msjLoad.show(100);
				progress.show(100);
				var percentVal = percentComplete + '%';
				bar.width(percentVal)
				percent.html(percentVal);
				//console.log(percentVal, position, total);
			},
			success: function() {
				var percentVal = '100%';
				bar.width(percentVal)
				percent.html(percentVal);
			},
			complete: function(xhr) {
				status.html(xhr.responseText);
			}
		});
	
	}));
	
	
	$('.btn_modulo').live('click' ,(function(event){
		
		event.preventDefault();
			
		$("#div-modulo-opcion").slideToggle();
		$("#frm-modulo-opcion").slideToggle();
			
	}));
	
	$('.btn_modulo').live('click' ,(function(event){
		
		event.preventDefault();
			
		$("#div-modulo-opcion").slideToggle();
		$("#frm-modulo-opcion").slideToggle();
			
	}));
	
	$("#txt_entidad").live("focus", function() {
	
		$(this).autocomplete({
		
			source: '../process/entidad/auto-completar-entidad.php',
			select: function( event, ui ) {

				$(this).val(ui.item.label);
				$("#cliente_id").val(ui.item.value);

				$.each(ui.item, function (key, data) {$("#"+key).val(data);});

				return false;
			}
		});
	});


	$("#text_cliente").live('focus', function() {
			
		$(this).autocomplete({
		
			  source: '../process/tercero/auto-completar-cliente.php',
			  focus: function( event, ui ) {
				$(this).val(ui.item.label);
				$("#cliente_id").val(ui.item.value);
				Funciones.cargar_formulario(ui.item.value, 'terceros', '', '', '');
				return false;
			  },
			  select: function( event, ui ) {
				$(this).val(ui.item.label);
				$("#cliente_id").val(ui.item.value);		 
				return false;
			  },

		});
	});

	
	$("#pais_destino").live('focus', function() {
			
			$(this).autocomplete({
			
				  source: '../process/tercero/auto-completar-pais-destino.php',
				  focus: function( event, ui ) {
					$(this).val(ui.item.label);
					$("#id_pais").val(ui.item.value);
					return false;
				  },
				  select: function( event, ui ) {
					$(this).val(ui.item.label);
					$("#id_pais").val(ui.item.value);			 
					return false;
				  },

			});
		});

	$("#pais").live('focus', function() {
			
			$(this).autocomplete({
			
				  source: '../process/tercero/auto-completar-pais-destino.php',
				  focus: function( event, ui ) {
					$(this).val(ui.item.label);
					$("#pais").val(ui.item.value);
					return false;
				  },
				  select: function( event, ui ) {
					$(this).val(ui.item.label);
					$("#pais").val(ui.item.value);			 
					return false;
				  },

			});
		});

	$("#text_proveedor").live('focus', function() {
			
		$(this).autocomplete({
		
			  source: '../process/tercero/auto-completar-proveedor.php',
			  focus: function( event, ui ) {
				$(this).val(ui.item.label);
				$("#cliente_id").val(ui.item.value);
				Funciones.cargar_formulario(ui.item.value, 'terceros', '', '', '');
				return false;
			  },
			  select: function( event, ui ) {
				$(this).val(ui.item.label);
				$("#cliente_id").val(ui.item.value);		 
				return false;
			  },

		});
	});

	$("#txt_producto").live("focus", function() {
	
		$(this).autocomplete({
		
			source: '../process/inventario/auto-completar-referencia.php',
			select: function( event, ui ) {

				$(this).val(ui.item.label);
				$("#ref").val(ui.item.value);		
				$("#frm-consulta-referencia").submit();		 
				return false;
			}
		});
	});

	$('#txt_cantidad').live('keyup' ,(function(event){
		
		event.preventDefault();
		
		nombre = $("#txt_producto").val();
		cantidad = $(this).val();
		
		$.post("../process/colombia-compra/consulta-menor-precio.php",{nombre: nombre, cantidad: cantidad},
			function(data){
				
				$("#rspasdf").html(data);
			}
		)
		
	}));

	$('#precio').live('keyup' ,(function(event){
		
		event.preventDefault();
		
		nombre = $("#txt_producto").val();
		precio = $(this).val();
		
		$.post("../process/colombia-compra/consulta-rentabilidad.php",{nombre: nombre, precio: precio},
			function(data){
				
				$("#rspasdf").html(data);
			}
		)
		
	}));

	$('#fecha_documento').live('change' ,(function(event){
		
			fecha = $(this).val();
			vari  = fecha.split("-");
			
			$('#periodo').val(vari[1]);
			$('#year').val(vari[0]);
			
	}));

	$('.fechaRem').live('focus' ,(function(event){

		event.preventDefault();

		rem = $("#remision").val();

		$.post("../process/documento/consulta-documento.php",{ documento: rem},
			function(data){	

				$("#rsp-frm-factura").html(data);
			}
		)
			
	}));

	$('#tipo_movimiento').live('change' ,(function(event){
		
		event.preventDefault();
	
		tipo_movimiento = $('#tipo_movimiento').val();
		documento		= $('#documento_cruce').val();
		documento_prin	= $('#documento').val();

		$("#rsp-frm-crear-rc-detalle").html('<center><img src="../resources/icons/loading.gif"/></center>');
		
		$.post("../process/tercero/consulta-saldo-factura.php",{ documento: documento, tipo_movimiento: tipo_movimiento, documento_prin: documento_prin},
			function(data){	

				$("#rsp-frm-agregar-a-rc").html(data);
			}
		)
		
				
	}));

	$("#txt_ciudad, #auto_ciudad").live('focus', function() {
			
			$(this).autocomplete({
			
				  source: '../process/tercero/auto-completar-ciudad.php',
				  focus: function( event, ui ) {
					$(this).val(ui.item.label);
					$("#id_ciudad").val(ui.item.value);
					return false;
				  },
				  select: function( event, ui ) {
					$(this).val(ui.item.label);
					$("#id_ciudad").val(ui.item.value);			 
					return false;
				  },

			});
		});

	
})	
	var Funciones = {

			
		 ajax_connect: function(url, data) {
			 
			return $.ajax({
				url: url,
				type: "POST",
				dataType: 'json',
				data: data
			});
		},
		
		
		auto_completar: function(id, action, rsp, tipo){
			
		},
		
		cargar_modal_estructura: function(id, action, rsp, tipo){
			
			event.preventDefault();
			
			$("#"+rsp).html('<center><img src="../resources/icons/loading.gif"/></center>');

			$.post("../process/general/cargar-estructura.php",{ id: id, action: action, tipo: tipo},
				function(data){	

					$("#"+rsp).html(data);
				}
			)
		},
		
		eliminar_registro: function(id, table, rsp, fadeOut){
			
			event.preventDefault();
			
			if(confirm('¿Deseas eliminar el registro?')) { 	
			
				$("#"+rsp).html('<center><img src="../resources/icons/loading.gif"/></center>');

				$.post("../process/general/eliminar-registro.php",{ id: id, table: table, fadeOut: fadeOut},
					function(data){	
						$("#"+rsp).html(data);
					}
				)
			}
		},
		
		eliminar_registro_session: function(id, table, rsp){
			
			event.preventDefault();
			
			if(confirm('¿Deseas eliminar el registro?')) { 	
			
				$("#"+rsp).html('<center><img src="../resources/icons/loading.gif"/></center>');

				$.post("../process/general/eliminar-registro-sesion.php",{ id: id, table: table},
					function(data){	
						$("#"+rsp).html(data);
					}
				)
			}
		},
		
		cerrar_documento: function(table, value, id, rsp){
			
			event.preventDefault();
			
			if(confirm('¿Deseas finalizar el documento?')) { 	
			
				$("#"+rsp).html('<center><img src="../resources/icons/loading.gif"/></center>');

				$.post("../process/general/cambiar-estado.php",{ table: table, value: value, id: id},
					function(data){	
						
						$("#"+rsp).html(data);
					}
				)
			}
		},

		asegurar_envio: function(table, value, id, rsp){
			
			event.preventDefault();
			
			
				$("#"+rsp).html('<center><img src="../resources/icons/loading.gif"/></center>');

				$.post("../process/general/cambiar-estado.php",{ table: table, value: value, id: id},
					function(data){	
						
						$("#"+rsp).html(data);
					}
				)

		},


		subir_archivo_masivo: function(id, table, rsp){			
			event.preventDefault();
			
			if(confirm('¿Al subir este archivo se borraran los datos existentes, Usted esta seguro de continuar con la operacion?')) { 	
			
				$("#"+rsp).html('<center><img src="../resources/icons/loading.gif"/></center>');

				$("#frm-subir-archivo").submit();	
				$.post("../process/proveedores/creador-masivo-tarifas.php",{ id: id, table: table},
					function(data){	
						$("#"+rsp).html(data);
					}
				)
			}
		},
		
		toggle_divs: function(div_active, div_none){
			
			event.preventDefault();
			
			$("#"+div_active).slideToggle();
			$("#"+div_none).slideToggle();
		},
		
		cargar_tab: function(id, tab, rsp){
			
			event.preventDefault();
			
			$("#"+rsp).html('<center><img src="../resources/icons/loading.gif"/></center>');

			$.post("../process/general/load-tabs.php",{ id: id, tab: tab},
				function(data){	

					$("#"+rsp).html(data);
				}
			)
		},
		
		cargar_formulario: function(id, table, rsp, div_active, div_none){
			
			event.preventDefault();
			
			$("#"+rsp).html('<center><img src="../resources/icons/loading.gif"/></center>');
			
			data = { id: id, table: table }
			
			 $.when(Funciones.ajax_connect("../process/general/cargar-formulario.php", data)).done(function(response) {
				
				console.log(response);
				
				$.each( response, function( key, value ) {
					if(value != null)	$("#"+key).val(value)
				});

				$("#"+rsp).html("");
				Funciones.toggle_divs(div_active, div_none);
				
			 });

		},
		
		agregar_permiso: function(variable, tabla, rsp){
			
			event.preventDefault();
			
			$("#"+rsp).html('<center><img src="../resources/icons/loading.gif"/></center>');

			$.post("../process/config/add-permisos.php",{ variable: variable, tabla: tabla},
				function(data){	

					$("#"+rsp).html(data);
				}
			)
		},
		
		cargar_select: function(select_id, select_val, select_load, table, pos_id, pos_val){
			
			id = $("#"+select_id).val();

			$.post("../process/general/cargar-select.php",{ id: id, table: table, pos_id: pos_id, pos_val: pos_val, select_val: select_val},
				function(data){	
					$("#"+select_load).html(data);
				}
			)
		},
		
		cargar_nivel: function(id, tab, div_active, div_none){
			
			event.preventDefault();
			
			Funciones.toggle_divs(div_active, div_none);
			
			$("#"+div_none).html('<center><img src="../resources/icons/loading.gif"/></center>');

			$.post("../process/general/load-tabs.php",{ id: id, tab: tab},
				function(data){	

					$("#"+div_none).html(data);
					
				}
			)
		},
		
		cerrar_documento_traspaso: function(accion, div){
			
			event.preventDefault();
			
			if(confirm('¿Deseas '+accion+' el documento?')) { 
						
				origen    = $("#origen").val();
				origen_2  = $("#origen_2").val();
				destino   = $("#destino").val();
				serie     = $("#serie").val();
				fecha     = $("#fecha").val();
				obs       = $("#obs").val();
				
				$("#"+div).html('<center><img src="../resources/icons/loading.gif"/></center>');
	
				$.post("../process/funcional/inventarios-accion-traspaso.php",{ accion: accion, origen: origen, destino: destino, serie: serie, fecha: fecha, obs: obs, origen_2: origen_2},
					function(data){	
	
						$("#"+div).html(data);
						
					}
				)
			}
		},
		
		presupuesto_vendedor: function(codigo, variable, rsp){
			
			event.preventDefault();
			
			$("#"+rsp).html('<center><img src="../resources/icons/loading.gif"/></center>');

			YEAR 				= $('#year').val();
			MES  				= $('#mes').val();
			ALMACEN  			= $('#almacen').val();
			VALORPRESUPUESTO  	= $('#PresVenD'+codigo).val();

			$.post("../process/funcional/presupuesto-accion-vendedores.php",{ YEAR: YEAR, MES: MES,
					ALMACEN: ALMACEN, CODIGOVEN: codigo, VALORPRESUPUESTO: VALORPRESUPUESTO, variable: variable},
				function(data){	
					$("#"+rsp).html(data);
				}
			)
			
		},
		
		moneyFormat : function (price) {
		
		  const pieces = parseInt(price).toFixed(2).split('');
		  let ii = pieces.length - 3;
		  while ((ii-=3) > 0) {
			pieces.splice(ii, 0, ',');
		  }
	
		  f_value = pieces.join('').replace(".00","");
		  f_value = f_value.replace(/,/g,".");
		  return f_value;
		},
		
		format_number : function(id) {
			init_val = $("#"+id).val();
			if( init_val != "" ) {
				pre_val = init_val.replace(/\./g,"");
				$("#"+id).attr("real-val",pre_val);
				new_val = Funciones.moneyFormat(pre_val);
				$("#"+id).val(new_val);
	
			} else {
				$("#"+id).attr("real-val","");
				$("#"+id).val("");
			}
		},
		
		cambiar_valor : function(id, valor, rsp) {
			
			valor = $("#cantidad_"+id).val();
			
			$("#"+rsp).html('<center><img src="../resources/icons/loading.gif"/></center>');

			$.post("../process/colombia-compra/accion-documento-beneficiario-producto.php",{ id: id, valor: valor},
				function(data){	
					
					$("#"+rsp).html(data);
				}
			)
		},

		finalizar_cotizacion: function(table, value, id, rsp){
			
			event.preventDefault();

			text = "Deseas rechazar esta cotización";

			if(value == 2) text = "Deseas aprobar esta cotización";

			
			if(confirm(text)) { 	
			
				$("#"+rsp).html('<center><img src="../resources/icons/loading.gif"/></center>');

				$.post("../process/general/cambiar-estado.php",{ table: table, value: value, id: id},
					function(data){	
						
						$("#"+rsp).html(data);
					}
				)
			}
		},

		cerrar_documento_nuevo: function(table, value, id, rsp){
			
			event.preventDefault();
			
			if(confirm('¿Deseas finalizar el documento?')) { 	
			
				$("#"+rsp).html('<center><img src="../resources/icons/loading.gif"/></center>');

				$.post("../process/general/cambiar-estado.php",{ table: table, value: value, id: id},
					function(data){	
						
						$("#"+rsp).html(data);
					}
				)
			}
		},

		add_car: function(id, cantidad, sugerido, rsp){
			
			event.preventDefault();

			$("#"+rsp).html('<center><img src="../resources/icons/loading.gif"/></center>');
			
			cant = $('#'+cantidad).val();
			suge = $('#'+sugerido).val();

			alert(id);
			alert(cant);
			alert(suge);
			
			$(".rspPed").html('<center><img src="../resources/icons/loading.gif"/></center>');
			
			$.post("../process/pedido/agregar-a-pedido.php",{ id: id, cant: cant, suge: suge},
				function(data){	

					$("#"+rsp).html(data);
				}
			)

		},

		add_car_pos: function(id, cantidad, rsp){
			
			event.preventDefault();

			cant = $('#'+cantidad).val();
			
			$("#"+rsp).html('<center><img src="../resources/icons/loading.gif"/></center>');
			
			$.post("../process/documento/accion-agregar-pos.php",{ id: id, cant: cant},
				function(data){	

					$("#"+rsp).html(data);
				}
			)

		},

		cargar_referencia: function(parametro, rsp){
			
			event.preventDefault();

			vari = 2;
			ref  = $('#'+parametro).val();

			$("#"+rsp).html('<center><img src="../resources/icons/loading.gif"/></center>');
			
			$.post("../process/inventario/consultar-referencia.php",{ ref: ref, vari: vari},
				function(data){	

					$("#"+rsp).html(data);
				}
			)

		},

		abrir_doc_espera: function(documento, rsp){
			
			event.preventDefault();

			$("#"+rsp).html('<center><img src="../resources/icons/loading.gif"/></center>');
			
			$.post("../process/documento/abrir-documento-pos.php",{ documento: documento},
				function(data){	

					$("#"+rsp).html(data);
				}
			)

		}

		
		

	}


