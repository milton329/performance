<?php session_start();
	
	if(isset($_SESSION["Usuario"]) && isset($_SESSION["rol"]) && isset($_SESSION["nombre"]) && isset($_SESSION["idUsuario"])){
		$entro = 1;
	}
	else $entro = 0;
?>
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">

	<?php 
		
		include '../default/location.php';
		include '../default/config.php';
	?>
    
  <!-- graficas milton -->
    <script src="../cods/graficas/code/highcharts.js"></script>
    <script src="../cods/graficas/code/highcharts-3d.js"></script>
    <script src="../cods/graficas/code/modules/exporting.js"></script>
    <script src="../cods/graficas/code/modules/export-data.js"></script>

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?= $info_empresa["titulo_html"];?>: <?= ucwords($folderDirect);?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,800,300&subset=latin" rel="stylesheet" type="text/css">

  <link href="../cods/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="../cods/css/ionic.min.css" rel="stylesheet" type="text/css">
  <link href="../cods/css/cssion.css" rel="stylesheet" type="text/css">
  <link href="../cods/css/c3.css" rel="stylesheet" type="text/css">
  <link href="../cods/css/jquery-ui.structure.min.css" rel="stylesheet" type="text/css">
  <link href="../cods/css/jquery-ui.theme.css" rel="stylesheet" type="text/css">


  <!-- DEMO ONLY: Function for the proper stylesheet loading according to the demo settings -->
  <script>function _pxDemo_loadStylesheet(a,b,c){var c=c||decodeURIComponent((new RegExp(";\\s*"+encodeURIComponent("px-demo-theme")+"\\s*=\\s*([^;]+)\\s*;","g").exec(";"+document.cookie+";")||[])[1]||"frost"),d="rtl"===document.getElementsByTagName("html")[0].getAttribute("dir");document.write(a.replace(/^(.*?)((?:\.min)?\.css)$/,'<link href="$1'+(c.indexOf("dark")!==-1&&a.indexOf("/css/")!==-1&&a.indexOf("/themes/")===-1?"-dark":"")+(d&&a.indexOf("assets/")===-1?".rtl":"")+'$2" rel="stylesheet" type="text/css"'+(b?'class="'+b+'"':"")+">"))}</script>

  <!-- DEMO ONLY: Set RTL direction -->
  <script>"1"===decodeURIComponent((new RegExp(";\\s*"+encodeURIComponent("px-demo-rtl")+"\\s*=\\s*([^;]+)\\s*;","g").exec(";"+document.cookie+";")||[])[1]||"0")&&document.getElementsByTagName("html")[0].setAttribute("dir","rtl");</script>

  <!-- DEMO ONLY: Load PixelAdmin core stylesheets -->
  <script>
    _pxDemo_loadStylesheet('../cods/css/bootstrap.css', 'px-demo-stylesheet-core');
    _pxDemo_loadStylesheet('../cods/css/pixeladmin.css', 'px-demo-stylesheet-bs');
    _pxDemo_loadStylesheet('../cods/css/widgets.css', 'px-demo-stylesheet-widgets');
  </script>

  <!-- DEMO ONLY: Load theme -->
  <script>
    function _pxDemo_loadTheme(a){var b=decodeURIComponent((new RegExp(";\\s*"+encodeURIComponent("px-demo-theme")+"\\s*=\\s*([^;]+)\\s*;","g").exec(";"+document.cookie+";")||[])[1]||"silver");_pxDemo_loadStylesheet(a+b+".min.css","px-demo-stylesheet-theme",b)}
    _pxDemo_loadTheme('../cods/themes/');
  </script>

  <!-- Demo assets -->
  <script>_pxDemo_loadStylesheet('../cods/demo/demo.css');</script>
  <!-- / Demo assets -->

    <script src="../cods/js/control/jquery-1.11.2.min.js"></script>
	  <script src="../cods/js/control/jquery-migrate-1.2.1.min.js"></script>
  	<script src="../cods/js/control/jquery.form.js"></script>
  	<script src="../cods/js/developer/funciones.js"></script>
  	<script src="../cods/js/control/d3.v3.min.js" charset="utf-8"></script>
  	<script src="../cods/js/control/c3.js"></script>
  	<script src="../cods/js/control/jquery-ui.min.js"></script>

  <!-- holder.js -->
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/holder/2.9.0/holder.js"></script>

  <script type="text/javascript">
    mxBasePath = '../src';
  </script>

  <!-- Loads and initializes the library -->
  <script type="text/javascript" src="../src/js/mxClient.js"></script>
  <!-- Table -->
    <script src="../cods/js/dataTables/datatables.min.js"></script>
    <script src="../cods/js/dataTables/datatables.min.css"></script>

    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5button"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel'},
                    {extend: 'pdf'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>
    
</head>
<body>