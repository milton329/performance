$(document).ready(function(event){	
	
	$('#frmLog').live('submit' ,(function(event){

			event.preventDefault();
			
			var user 	= $('#user').val();
			var pass 	= $('#pass').val();
			
			$('.retorno').fadeIn()
			
			$.post("process/ingreso/login.php",{ user: user, pass: pass},
	
				function(data){	
		
					$('.retorno').fadeOut(); 
					$('#rspLogin').html(data); 
				} 
	
			)}
	))        	
				
	
	
		 
})