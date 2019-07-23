<!DOCTYPE html>
<?php 
    
    require_once 'class/classGlobal.php';
      
    $oGlobals = new Globals(); 
      
    $info_empresa = $oGlobals->verOpcionesPor("config_informacion_empresa", "", 0);
?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>e-performance</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,800,300&subset=latin" rel="stylesheet" type="text/css">
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">

  <!-- DEMO ONLY: Function for the proper stylesheet loading according to the demo settings -->
  <script>function _pxDemo_loadStylesheet(a,b,c){var c=c||decodeURIComponent((new RegExp(";\\s*"+encodeURIComponent("px-demo-theme")+"\\s*=\\s*([^;]+)\\s*;","g").exec(";"+document.cookie+";")||[])[1]||"default"),d="rtl"===document.getElementsByTagName("html")[0].getAttribute("dir");document.write(a.replace(/^(.*?)((?:\.min)?\.css)$/,'<link href="$1'+(c.indexOf("dark")!==-1&&a.indexOf("/css/")!==-1&&a.indexOf("/themes/")===-1?"-dark":"")+(d&&a.indexOf("assets/")===-1?".rtl":"")+'$2" rel="stylesheet" type="text/css"'+(b?'class="'+b+'"':"")+">"))}</script>

  <!-- DEMO ONLY: Set RTL direction -->
  <script>"1"===decodeURIComponent((new RegExp(";\\s*"+encodeURIComponent("px-demo-rtl")+"\\s*=\\s*([^;]+)\\s*;","g").exec(";"+document.cookie+";")||[])[1]||"0")&&document.getElementsByTagName("html")[0].setAttribute("dir","rtl");</script>

  <!-- DEMO ONLY: Load PixelAdmin core stylesheets -->
  <script>
    _pxDemo_loadStylesheet('cods/css/bootstrap.css', 'px-demo-stylesheet-core');
    _pxDemo_loadStylesheet('cods/css/pixeladmin.css', 'px-demo-stylesheet-bs');
    _pxDemo_loadStylesheet('cods/css/widgets.css', 'px-demo-stylesheet-widgets');
  </script>

  <!-- DEMO ONLY: Load theme -->
  <script>
    function _pxDemo_loadTheme(a){var b=decodeURIComponent((new RegExp(";\\s*"+encodeURIComponent("px-demo-theme")+"\\s*=\\s*([^;]+)\\s*;","g").exec(";"+document.cookie+";")||[])[1]||"default");_pxDemo_loadStylesheet(a+b+".min.css","px-demo-stylesheet-theme",b)}
    _pxDemo_loadTheme('cods/themes/');
  </script>

  <!-- Demo assets -->
  <script>_pxDemo_loadStylesheet('cods/demo/demo.css');</script>
  <!-- / Demo assets -->


  <script src="cods/js/control/jquery-1.11.2.min.js"></script>
  <script src="cods/js/control/jquery-migrate-1.2.1.min.js"></script>
    <script src="cods/demo/demo.js"></script>
    <script src="cods/js/control/jquery.form.js"></script>
    <script src="cods/js/developer/funciones.js"></script>
    <script src="cods/js/developer/log.js"></script>

</head>
<body style=" background: rgba(0,0,0,.5) !important">
  <script>var pxInit = [];</script>

  <!-- Custom styling -->
  <style>
    .page-signin-modal {
      position: relative;
      top: auto;
      right: auto;
      bottom: auto;
      left: auto;
      z-index: 1;
      display: block;
    }

    .page-signin-form-group { position: relative; }

    .page-signin-icon {
      position: absolute;
      line-height: 21px;
      width: 36px;
      border-color: rgba(0, 0, 0, .14);
      border-right-width: 1px;
      border-right-style: solid;
      left: 1px;
      top: 9px;
      text-align: center;
      font-size: 15px;
    }

    html[dir="rtl"] .page-signin-icon {
      border-right: 0;
      border-left-width: 1px;
      border-left-style: solid;
      left: auto;
      right: 1px;
    }

    html:not([dir="rtl"]) .page-signin-icon + .page-signin-form-control { padding-left: 50px; }
    html[dir="rtl"] .page-signin-icon + .page-signin-form-control { padding-right: 50px; }

    #page-signin-forgot-form {
      display: none;
    }

    /* Margins */

    .page-signin-modal > .modal-dialog { margin: 30px 10px; }

    @media (min-width: 544px) {
      .page-signin-modal > .modal-dialog { margin: 60px auto; }
    }
  </style>
  

  <div class="page-signin-modal modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="box m-a-0">
          <div class="box-row">

            <div class="box-cell col-md-5 bg-danger p-a-4">
              <div class="text-xs-center text-md-left">
                <a class="px-demo-brand px-demo-brand-lg" href="index.html"><span class="px-demo-logo bg-danger m-t-0"><span class="px-demo-logo-1"></span><span class="px-demo-logo-2"></span><span class="px-demo-logo-3"></span><span class="px-demo-logo-4"></span><span class="px-demo-logo-5"></span><span class="px-demo-logo-6"></span><span class="px-demo-logo-7"></span><span class="px-demo-logo-8"></span><span class="px-demo-logo-9"></span></span><span class="font-size-18 line-height-1"><strong>e-performance</strong></span></a>
                <div class="font-size-15 m-t-1 line-height-1">Business Intelligence</div>
              </div>
              <ul class="list-group m-t-3 m-b-0 visible-md visible-lg visible-xl">
                <li class="list-group-item p-x-0 p-b-0 b-a-0"><i class="list-group-icon fa fa-sitemap text-white"></i> Estructura modular</li>
                <li class="list-group-item p-x-0 p-b-0 b-a-0"><i class="list-group-icon fa fa-file-text-o text-white"></i> Eficaz</li>
                <!-- <li class="list-group-item p-x-0 p-b-0 b-a-0"><i class="list-group-icon fa fa-outdent text-white"></i> RTL direction support</li> -->
                <li class="list-group-item p-x-0 p-b-0 b-a-0"><i class="list-group-icon fa fa-heart text-white"></i> Amigable</li>
              </ul>
            </div>

            <div class="box-cell col-md-7">

              <!-- Sign In form -->

              <form action="process/ingreso/login.php" class="form_sdv_login p-a-4" id="frm-login" method="post">
                <h4 class="m-t-0 m-b-4 text-xs-center font-weight-semibold">Ingresa con tu cuenta</h4>

                <fieldset class="page-signin-form-group form-group form-group-lg">
                  <div class="page-signin-icon text-muted"><i class="ion-person"></i></div>
                  <input type="text" class="page-signin-form-control form-control" placeholder="Usuario" name="user" id="user">
                </fieldset>

                <fieldset class="page-signin-form-group form-group form-group-lg">
                  <div class="page-signin-icon text-muted"><i class="ion-asterisk"></i></div>
                  <input type="password" class="page-signin-form-control form-control" placeholder="Contraseña" name="pass" id="pass">
                </fieldset>

                <div class="clearfix" id="rsp-frm-login">
                  <label class="custom-control custom-checkbox pull-xs-left">

                  </label>
                </div>

                <button type="submit" class="btn btn-block btn-lg btn-danger m-t-3">Ingresar</button>
              </form>

              <div class="p-y-3 p-x-4 b-t-1 bg-white darken" id="page-signin-social">
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="cods/js/control/bootstrap.js"></script>
  <script src="cods/js/control/pixeladmin.js"></script>

 <script src="cods/js/control/jquery-ui-datapicker.js"></script>
 <script src="cods/js/control/datepicker-es.js"></script>

  
</body>
</html>
