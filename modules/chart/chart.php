<?php
$chart = new Chart();
$core=new Core();
$data = $chart->show();
$modname="chart";
?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Charts [Efektifitas Perencanaan]
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Chart</li>
  </ol>
</section>
<div class="maincontent">
<div class="contentinner">
 <!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <!-- Line chart -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <i class="fa fa-bar-chart-o"></i>
          <h3 class="box-title">Line Chart</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
           <div class="chart">
                <canvas id="lineChart" style="height:300px"></canvas>
              </div>
        </div><!-- /.box-body-->
      </div><!-- /.box -->

      <!-- Area chart -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <i class="fa fa-bar-chart-o"></i>
          <h3 class="box-title">Area Chart</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="chart">
            <canvas id="areaChart" style="height:300px"></canvas>
          </div>
        </div><!-- /.box-body-->
      </div><!-- /.box -->

    </div><!-- /.col -->

    <div class="col-md-6">
      <!-- Bar chart -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <i class="fa fa-bar-chart-o"></i>
          <h3 class="box-title">Bar Chart</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div id="bar-chart" style="height: 300px;"></div>
        </div><!-- /.box-body-->
      </div><!-- /.box -->

      <!-- Donut chart -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <i class="fa fa-bar-chart-o"></i>
          <h3 class="box-title">Donut Chart</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div id="donut-chart" style="height: 300px;"></div>
        </div><!-- /.box-body-->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->

</div><!-- ./wrapper -->

<script>
      $(function () {
        /*
         * BAR CHART
         * ---------
         */

        var bar_data = {
          data: [
		  <?php
            $i=1;
            if($data !=0){
            foreach ($data as $value) {
            extract($value);
          ?>    
		  ["<?php echo $activitycode; ?>",  <?php echo $percentage; ?>],
		  <?php
			$i++;
				}
				}  
		  ?> 
		  ],
          color: "#3c8dbc"
        };
        $.plot("#bar-chart", [bar_data], {
          grid: {
            borderWidth: 1,
            borderColor: "#f3f3f3",
            tickColor: "#f3f3f3"
          },
          series: {
            bars: {
              show: true,
              barWidth: 0.5,
              align: "center"
            }
          },
          xaxis: {
            mode: "categories",
            tickLength: 0
          }
        });
        /* END BAR CHART */

        /*
         * DONUT CHART
         * -----------
         */

        var donutData = [
		 <?php
            $i=1;
            if($data !=0){
            foreach ($data as $value) {
            extract($value);
          ?>    
          {label: "<?php echo $activitycode; ?>", data: <?php echo $percentage; ?>},
		  <?php
			$i++;
				}
				}  
		  ?> 
        ];
        $.plot("#donut-chart", donutData, {
          series: {
            pie: {
              show: true,
              radius: 1,
              innerRadius: 0.5,
              label: {
                show: true,
                radius: 2 / 3,
                formatter: labelFormatter,
                threshold: 0.1
              }

            }
          },
          legend: {
            show: false
          }
        });
        /*
         * END DONUT CHART
         */

      });

      /*
       * Custom Label formatter
       * ----------------------
       */
      function labelFormatter(label, series) {
        return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
                + label
                + "<br>"
                + Math.round(series.percent) + "%</div>";
      }
    </script>
    
    
    

 <script>
      $(function () {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var areaChart = new Chart(areaChartCanvas);

        var areaChartData = {
          labels: [
		  <?php
            $i=1;
            if($data !=0){
            foreach ($data as $value) {
            extract($value);
          ?>    
		  "<?php echo $activitycode; ?>",  
		  <?php
                $i++;
                    }
                    }  
            ?> 
		  ],
          datasets: [
            {
              label: "Digital Goods",
              fillColor: "rgba(60,141,188,0.9)",
              strokeColor: "rgba(60,141,188,0.8)",
              pointColor: "#3b8bba",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [
			  <?php
				$i=1;
				if($data !=0){
				foreach ($data as $value) {
				extract($value);
			  ?>    
			   <?php echo $percentage; ?>,
			  <?php
                $i++;
                    }
                    }  
               ?> 
			  ]
            }
          ]
        };

        var areaChartOptions = {
          //Boolean - If we should show the scale at all
          showScale: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: false,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - Whether the line is curved between points
          bezierCurve: true,
          //Number - Tension of the bezier curve between points
          bezierCurveTension: 0.3,
          //Boolean - Whether to show a dot for each point
          pointDot: false,
          //Number - Radius of each point dot in pixels
          pointDotRadius: 4,
          //Number - Pixel width of point dot stroke
          pointDotStrokeWidth: 1,
          //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
          pointHitDetectionRadius: 20,
          //Boolean - Whether to show a stroke for datasets
          datasetStroke: true,
          //Number - Pixel width of dataset stroke
          datasetStrokeWidth: 2,
          //Boolean - Whether to fill the dataset with a color
          datasetFill: true,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: true,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true
        };

        //Create the line chart
        areaChart.Line(areaChartData, areaChartOptions);

        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas);
        var lineChartOptions = areaChartOptions;
        lineChartOptions.datasetFill = false;
        lineChart.Line(areaChartData, lineChartOptions);

        
      });
    </script>