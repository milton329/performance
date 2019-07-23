<div class="col-md-12">
              <a href="#" class="box bg-danger">
                <div class="box-cell p-a-3 valign-middle">
                  <i class="box-bg-icon middle right fa fa-user"></i>
                                    
                  <div class="col-md-12">
                  <center>
                  <span class="font-size-20"><b>El Cajero : <?=utf8_encode($_SESSION["usuario"]);?> ( Tiene un cuadre abierto ) </b></span>
                  </center>                 
                  <center>
                    <span class="font-size-16"> Cuadre Numero : <?=utf8_encode($numero);?></span>
                  </center>
                  <center>
                    <span class="font-size-16"> Valor : $ <?=number_format($valor,0, "", ".");?></span>
                  </center>
                  <center>
                    <span class="font-size-16"> Fecha : <?=date($fecha);?></span>
                  </center>
                  </div>
                  

                </div>
              </a>
         </div> 