<div class="page-header">
    <div class="col-md-4 text-xs-center text-md-left text-nowrap">
      <h1>
        <span class="text-muted font-weight-light"><i class="page-header-icon menu-icon fa fa-tachometer"></i>Dashboard / </span>
        Cuadrantes
      </h1>
    </div>
</div> 


            <div class="row">
           
         <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
             
                </div>

  <script type="text/javascript">
Highcharts.chart('container', {
    title: {
        text: 'Height vs Weight'
    },
    subtitle: {
        text: 'Polygon series in Highcharts'
    },
    xAxis: {
        gridLineWidth: 1,
        title: {
            enabled: true,
            text: 'y'
        },
        startOnTick: true,
        endOnTick: true,
        showLastLabel: true
    },
    yAxis: {
        title: {
            text: 'x'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
    series: [{
        name: '',
        type: 'scatter',
        color: Highcharts.getOptions(),
        data: [[1,1], [99,95]]

    },    
    {
        name: 'Calificaciones2',
        type: 'scatter',
        color: Highcharts.getOptions().colors[3],
        data: [[60,30],[55,25],[80,30],[90,25]]

    },
    {
        name: 'Calificaciones3',
        type: 'scatter',
        color: Highcharts.getOptions().colors[4],
        data: [[20,80],[30,75],[45,60],[12,65]]

    },
    {
        name: 'Calificaciones4',
        type: 'scatter',
        color: Highcharts.getOptions().colors[5],
        data: [[60,82],[70,75],[85,60],[55,95]]

    },
    {
        name: 'Calificaciones',
        type: 'scatter',
        color: Highcharts.getOptions().colors[1],
        data: [[4,30],[15,25],[30,30],[45,48]]

    }],
    tooltip: {
        headerFormat: '<b>{series.name}</b><br>',
        pointFormat: '{point.x} cm, {point.y} kg'
    }
});

    </script>


