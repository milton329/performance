<?php
session_start();
unset($_SESSION["idUsuario"]);
unset($_SESSION["nombre"]);
unset($_SESSION["apellido"]);
unset($_SESSION["usuario"]);
session_unset();
session_destroy();
echo "Cerrando...<script language='JavaScript' type='text/javascript'>
					setTimeout('self.location=\"../\"', 1000)
				  </script>";
?>
