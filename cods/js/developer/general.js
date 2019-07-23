$(document).ready(function(event){	
	        	

	
	$(".load_cities").live('change', (function(event){
		
		var idDpto = $(this).val();
		
		$.post("../process/general/cargar-ciudad.php",{ idDpto: idDpto},
			function(data){
				
				$("#id_ciudad, #id_ciudad_nacimiento").html(data);
			
			})
	}));
	
	$(".load_cities_2").live('change', (function(event){
		
		var idDpto = $(this).val();
		
		$.post("../process/general/cargar-ciudad.php",{ idDpto: idDpto},
			function(data){
				
				$("#id_ciudad_residencia").html(data);
			
			})
	}));
	
	
	$(".load_groups").live('change', (function(event){
		
		var id = $(this).val();
		
		$.post("../process/general/cargar-grupos.php",{ id: id},
			function(data){
				
				$("#grupo, #id_grupo").html(data);
				
			
			})
	}));
	
	
	
		 
})