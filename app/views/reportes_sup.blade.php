@extends('main')

@section('body')
<?php
$campania = Input::get('camp');
$date = date('Y-m-d');
$envios = DB::table('correos')->where('camp', $campania)->where('send', 'si')->count();
$user = DB::table('campanias')->where('nombre', $campania)->get();
foreach ($user as $get) {
  $usuario = $get->bouncing;
  $clave = $get->pass;
}
$aperturas = DB::table('correos')->where('camp', $campania)->where('check', 'si')->get();
$abiertos = DB::table('correos')->where('camp', $campania)->where('check', 'si')->count();
$mbox = imap_open("{http://rsb48.rhostbh.com:993/imap/ssl}INBOX", $usuario, $clave);
$rebotes = imap_num_msg($mbox);
imap_close($mbox);
$suma = $rebotes + $abiertos;
$StanBy = $envios - $suma;
?>
<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
       google.setOnLoadCallback(drawChart3);
      function drawChart3() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Correos', { role: 'style' }],
          ['StandBy',     {{$StanBy}}, 'blue'],
          ['Rebotes',      {{$rebotes}}, 'red'],
          ['Abiertos',  {{$abiertos}}, '{color : green}']
        ]);

        var options = {
          title: 'Enviados: {{$envios}}'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
      google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Correos', { role: 'style' }],
          ['Enviados',     {{$envios}}, 'blue'],
          ['Rebotes',      {{$rebotes}}, 'red'],
          ['Abiertos',  {{$abiertos}}, 'green']
        ]);

        var options = {
          title: 'Reporte de Envio'
        };

        var chart = new google.visualization.BarChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
       google.setOnLoadCallback(drawChart2);
      function drawChart2() {
        var data2 = google.visualization.arrayToDataTable([
          ['Year', 'Aperturas'],
          <?php
          
          $fechas = DB::table('correos')->where('camp', $campania)->where('check', 'si')->groupBy('fecha')->get();
          foreach ($fechas as $fecha) {
            $cantidad = DB::table('correos')->where('camp', $campania)->where('fecha', $fecha->fecha)->where('check', 'si')->count();
            echo "['" . $fecha->fecha . "', " . $cantidad . "],";
          }
         
          ?>
         
        ]);

        var options2 = {
          title: 'Aperturas Diarias'
        };

        var chart2 = new google.visualization.LineChart(document.getElementById('chart_div'));

        chart2.draw(data2, options2);
      }
    </script>
    <center><h3>Reportes para {{$campania}} - Fecha: {{date('d/m/Y')}}</h3></center>
    <table align="center">
      <tr>
        <td>
           <div id="piechart2" style="width: 900px; height: 500px;"></div>
        </td>
        <td>
        <div style="width:300px">
          <?php
          $muestra = DB::table('campanias')->where('nombre', $campania)->get();
          foreach ($muestra as $value) {
           echo $value->texto;
          }
          ?>
          </div>
        </td>
        </tr>
        <tr>
        <td>
           <div id="piechart" style="width: 900px; height: 500px;"></div>
        </td>
        
        </tr>
        <tr>
          <td>
          <div id="chart_div" style="width: 900px; height: 500px;"></div>
        </td>
        </tr>
      
    </table>
   
    
    <br>
  <br>
  <center><a href="supervisor"><img src="img/volver.gif" style="width:80px"></a></center>
@stop