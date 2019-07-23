    
    <div class="page-header">
        <div class="col-md-4 text-xs-center text-md-left text-nowrap">
          <h1>
            <span class="text-muted font-weight-light"><i class="page-header-icon fa fa-shopping-basket"></i>POS / Ventas /</span>
            Ventas en espera POS
          </h1>
        </div>
    </div>

    <div class="panel">
      <div class="panel-body">
        <div class="table-primary">

                    <br /><br />
                        
                    <div id="rsp-frm-consulta-bodega" class="tabletable">
                    
                      <?php 
                      
                            $apertura      = "SELECT * FROM pos_cuadre where cajero='".$_SESSION["usuario"]."' and cerrado='0'";
                            $dato_apertura = $oGlobals->verPorConsultaPor($apertura, 0);

                            $id     = $dato_apertura['id'];
                            $numero = $dato_apertura['numero'];
                            $caja   = $dato_apertura['caja'];
                            $cajero = $dato_apertura['cajero'];

                            $sql = "SELECT MP.*, SUM(sub_pedido) AS total_pedido, SUM(cantidad_pedida) AS total_cantidad
                                    FROM mov_pedido AS MP 
                                    LEFT JOIN mov_r_pedidos AS MRP ON MP.documento = MRP.documento
                                    WHERE MP.cerrado = 0 AND MP.id_empresa = $id_empresa
                                    AND MP.caja='".$caja."' and MP.cajero='".$cajero."' and MP.cuadre='".$numero."'
                                    GROUP BY MP.documento
                                    ORDER BY MP.id DESC";
                            $documentos = $oGlobals->verPorConsultaPor($sql, 1);

                            include 'tablas/tb-ventas-pos.php';
                        ?>
   
                    </div> 
                    
                    <div id="load_talla" class="modal fade" role="dialog"></div> 

            </div>
        </div>
    </div>    

        

    	
  