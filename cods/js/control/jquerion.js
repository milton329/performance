var Ion = {	
		
	init : function(){
		
		console.log("RUN 1123");

		$(document).ready(function() {			
			
			$(window).resize(function() {
				setTimeout('Ion.ion_dimensiona()', 10);
				setTimeout('Ion.ion_dimensiona()', 500);			
			});			
			
			Ion.ion_dimensiona();
			setTimeout('Ion.ion_dimensiona()', 100);
			setTimeout('Ion.ion_dimensiona()', 1000);
			
		});
		
	},
	
	ion_dimensiona : function(){

		var alto 		= $(window).height();
		var ancho 		= $(window).width();		
		
		if(ancho > 1200){			
			$(".camVenta").height(alto-269);
			$(".camProds").height(alto-169);
		} else if(ancho < 768)	{
			$(".finesaMod1").width(1900-151);
			$(".finesaMod2").stop().show(500).width(150);
		}else{
			$(".camProds").width(alto-150);
			$(".finesaMod2").stop().show(500).width(150);
		}
		
		if(alto > 550)	{			
			$(".getHeight").height(alto);	
			$(".allion").height(alto);	
			$(".allion-40").height(alto);
		} else {			
			$(".getHeight").height(550);	
			$(".allion").height(550);
			$(".allion-40").height(550-40);
		}
		

		
		var finesaMod1	= $(".finesaMod1").height();
		$(".finesaMod2").css('height', finesaMod1);
		
	}

};

Ion.init();



