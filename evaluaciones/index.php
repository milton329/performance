<?php 

	include "../default/head.php"; 
	if($entro == 1){
	
		include "../default/header.php"; 
		include "content.php"; 
		include "../default/footer.php"; 
	}
	else echo "<script>setTimeout('self.location=\"../\"', 200)</script>";
?>