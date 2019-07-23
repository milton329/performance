<center>
        <table style="width:98%;">
                        <tr>
                            <td style="background-color:#D8D8D8;">
                                  <center><div class="pull-xs-center m-y-1 font-size-16 text-muted"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RECIBIDO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div></center>
                            </td>
                            <td style="background-color:#00b3ff;">
                                  <center><div class="pull-xs-center m-y-1 font-size-16 text-muted"><strong><font color='white'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CAMBIO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></strong></div></center>
                            </td>
                            <td style="background-color:#D8D8D8;">
                                  <center><div class="pull-xs-center m-y-1 font-size-16 text-muted"><strong>TOTAL A PAGAR</strong></div></center>
                            </td>
                        </tr>
                        <tr>
                            <td style="background-color:#D8D8D8;">
                                  <center><div class="pull-xs-center font-size-24"><strong id="fact">$ 0</strong></div></center>
                            </td>
                            <td style="background-color:#00b3ff;">
                                  <center><div class="pull-xs-center font-size-24"><strong id="fact"><font color='white'>$ 0</font></strong></div></center>
                            </td>
                            <td style="background-color:#D8D8D8;">
                                  <center><div class="pull-xs-center font-size-24"><strong id="fact">$ <?= number_format($total["total"], 0, "", ".");?></strong></div></center>
                            </td>
                         </tr>
                        </table></center>
    
    </center>
    <br>
    <br>
    <br>
    <center>
            <button type="button" class="btn btn-xl btn-danger btn-3d" data-dismiss="modal" onclick="reload();">CANCELAR</button>
    </center>
    