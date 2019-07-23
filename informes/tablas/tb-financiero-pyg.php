
<?php 
    foreach ($clases as $clase) {
?>
        <div class="col-md-8">
            <div class="panel">
              <div class="panel-heading bg-primary darker text-white">
                <div class="panel-title"><?= utf8_encode($clase["clase"]) ?></div>
              </div>
              <div class="table-responsive">
                <table class="table table-striped valign-middle">
                  <thead>
                    <tr>
                        <th>Category</th>
                        <th class="text-xs-right">Views</th>
                        <th class="text-xs-right">Purchases</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="#">Landing pages</a></td>
                            <td class="text-xs-right">131,315</td>
                            <td class="text-xs-right">4,132</td>
                            <td class="text-xs-right"><div class="trending-graph"><canvas width="46" height="20" style="display: inline-block; width: 46px; height: 20px; vertical-align: top;"></canvas></div></td>
                        </tr>
                    </tbody>
                </table>
              </div>
            </div>
        </div>
 <?php 
    }
 ?> 

