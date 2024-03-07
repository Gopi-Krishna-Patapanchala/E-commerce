<?php

 ?>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  </head>
  <body>
    <div id="chart"></div>
    <script>
      var options = {
         series: [{
         data: [21, 22, 10, 28, 16, 21, 13, 30]
       }],
         chart: {
         height: 350,
         type: 'bar',
         events: {
           click: function(chart, w, e) {

           }
         }
       },

       dataLabels: {
         enabled: false
       },
       legend: {
         show: false
       },
       xaxis: {
         categories: [
           'John',
           'Joe',
           'Jake',
           'Amber',
           'peter',
           'Mary',
           'David',
           'Lilly',
         ]
       },
       plotOptions: {
           bar: {
             distributed: true
           }
         }

       };

       var chart = new ApexCharts(document.querySelector("#chart"), options);
       chart.render();
      </script>
    </body>
    </html>
