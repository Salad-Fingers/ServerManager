<?php
//require stats extract here by linking it from whereever it is
//I just left it in the root where this page is too
require 'stats.extract.php';

//initiate the library
$se = new StatsExtract;

//now, you need to get ip and port. Do this as however you wish, i'm just putting in demo ip/port. Remember , you can move all this to anywhere you want on the page.
//Just before the functions in the tables and graphs

$svinfo = $se->parse_live_server_stats('81.30.156.51',10005);
$online = false;
$svhtml = $se->parse_htmlstats('serverstats.html');
$svuser = $se->parse_userstats('userstats.dat');
if(!empty($svinfo)){
  $online = true;
}
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Basic CMS - Admin Area</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
   <body class="skin-blue sidebar-mini">
  <?php
	session_start();
	include("./includes/functions.php");
		if(isset($_SESSION['user'])) {
			} else {
			header("Location: login.php");
		}
	error_reporting(E_ALL);

	// Report all PHP errors
	error_reporting(-1);
	
	// includes for navbar, statusbar, etc
	include("./includes/navbar.php");
	include("./includes/notifications.php");
	include("./includes/tasks.php");
	include("./includes/userbar.php");
	include("./includes/toggle-sidebar.php");
	include("./includes/sidebar.php");
	?>
    

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Your Page Content Here -->
            <div class="row">
              <div class="col-md-12">
                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Server Statisitics</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <table class="table table-bordered">
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Server Name</th>
                        <th>Uptime</th>
                        <th>Total Uploads</th>
                        <th>Total Downloads</th>
                        <th>Players</th>
                        <th>Map</th>
                        <th>Ranked Users</th>
                        <th>USGN</th>
                        <th>LUA</th>
                        <th>Status</th>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td><?php if($online){echo $svinfo['name'];}else{echo "N/A";} ?></td>
                        <td><?php echo $svhtml['stats']['uptime'].'h'; ?></td>
                        <td><?php echo $se->float_fix($svhtml['stats']['upload'],2).' mb'; ?></td>
                        <td><?php echo $se->float_fix($svhtml['stats']['download'],2).' mb'; ?></td>
                        <td><?php if($online){echo $svinfo['total-players'];}else{echo "N/A";} ?></td>
                        <td><?php if($online){echo $svinfo['map'];}else{echo "N/A";} ?></td>
                        <td><?php echo $svhtml['stats']['ranked-players'] ;?></td>
                        <td><?php if($online){if($svinfo['usgn-only']){ ?><span class="badge bg-red">usgn-only</span><?php }else{ ?><span class="badge bg-green">yes</span><?php }}else{echo "N/A";} ?></td>
                        <td><?php if($online){if($svinfo['lua']){ ?><span class="badge bg-purple">uses-lua</span><?php }else{ ?><span class="badge bg-red">none</span><?php }}else{echo "N/A";} ?></td>
                        <td><?php if($online){ ?><span class="badge bg-green">online</span><?php }else{ ?><span class="badge bg-red">offline</span><?php } ?></td>
                      </tr>
                    </table>
                    <table class="table table-bordered">
                      <tr>
                        <th>Total Download Traffic Today</th>
                        <th>Total Upload Traffic Today</th>
                        <th>Total Player Traffic Today</th>
                        <th>Avg. Players per Hour</th>
                      </tr>
                      <tr>
                        <td><?php $arr=array();for($i=1;$i<=24;++$i){$arr[]=$svhtml['graph'][$i]['download'];} echo $se->float_fix($se->calc_total($arr),1).' mb'; ?></td>
                        <td><?php $arr=array();for($i=1;$i<=24;++$i){$arr[]=$svhtml['graph'][$i]['upload'];} echo $se->float_fix($se->calc_total($arr),1).' mb'; ?></td>
                        <td><?php $arr=array();for($i=1;$i<=24;++$i){$arr[]=$svhtml['graph'][$i]['players'];} echo $se->calc_total($arr); ?></td>
                        <td><?php $arr=array();for($i=1;$i<=24;++$i){$arr[]=$svhtml['graph'][$i]['players'];} echo $se->float_fix($se->calc_avg($arr),1); ?></td>
                      </tr>
                    </table>
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              <div class="row">
                <div class="col-md-6">
                  <!-- AREA CHART -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Players (Today)</h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <div class="box-body">
                      <div class="chart">
                        <canvas id="areaChart" style="height:250px"></canvas>
                      </div>
                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
                </div>

                <div class="col-md-6">
                  <!-- AREA CHART -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Upload/Download (Today)</h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <div class="box-body">
                      <div class="chart">
                        <canvas id="areaChart2" style="height:250px"></canvas>
                      </div>
                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
                </div>
              </div>

          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Player Information</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Usgn</th>
                        <th>Score</th>
                        <th>Kills</th>
                        <th>Deaths</th>
                        <th>K/D Ratio</th>
                        <th>Time On Server</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $reg_count = count($svuser);
                    for($i=1;$i<=$reg_count;++$i){
                      $kpd = "N/A";
                      if($svuser[$i]['deaths']==0){
                        $kpd = $svuser[$i]['frags'];
                      }else{
                        $kpd = $se->float_fix($svuser[$i]['frags']/$svuser[$i]['deaths'],2);
                      }
                      echo "<tr><td>".$svuser[$i]['name']."</td><td><a href=\"http://www.unrealsoftware.de/profile.php?userid=".$svuser[$i]['usgn']."\" target=\"_blank\">".$svuser[$i]['usgn']."</a></td><td>".$svuser[$i]['score']."</td><td>".$svuser[$i]['frags']."</td><td>".$svuser[$i]['deaths']."</td><td>".$kpd."</td><td>".$se->calc_tos($svuser[$i]['tos'])."</td></tr>";
                    }
                    ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Usgn</th>
                        <th>Score</th>
                        <th>Kills</th>
                        <th>Deaths</th>
                        <th>K/D Ratio</th>
                        <th>Time On Server</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <?php 
	  include("./includes/footer.php");
	  include("./includes/asidebar.php");
	 ?>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="plugins/chartjs/Chart.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
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
        var areaChartCanvas2 = $("#areaChart2").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var areaChart = new Chart(areaChartCanvas);
        var areaChart2 = new Chart(areaChartCanvas2);

        var areaChartData = {
          labels: ["1am","2am","3am","4am","5am","6am","7am","8am","9am","10am","11am","12am","1pm","2pm","3pm","4pm","5pm","6pm","7pm","8pm","9pm","10pm","11pm","12am"],
          datasets: [
            {
              label: "Players",
              fillColor: "rgba(210, 214, 222, 1)",
              strokeColor: "rgba(210, 214, 222, 1)",
              pointColor: "rgba(210, 214, 222, 1)",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: [
                <?php echo json_encode($svhtml['graph'][1]['players']); ?>,
                <?php echo json_encode($svhtml['graph'][2]['players']); ?>,
                <?php echo json_encode($svhtml['graph'][3]['players']); ?>,
                <?php echo json_encode($svhtml['graph'][4]['players']); ?>,
                <?php echo json_encode($svhtml['graph'][5]['players']); ?>,
                <?php echo json_encode($svhtml['graph'][6]['players']); ?>,
                <?php echo json_encode($svhtml['graph'][7]['players']); ?>,
                <?php echo json_encode($svhtml['graph'][8]['players']); ?>,
                <?php echo json_encode($svhtml['graph'][9]['players']); ?>,
                <?php echo json_encode($svhtml['graph'][10]['players']); ?>,
                <?php echo json_encode($svhtml['graph'][11]['players']); ?>,
                <?php echo json_encode($svhtml['graph'][12]['players']); ?>,
                <?php echo json_encode($svhtml['graph'][13]['players']); ?>,
                <?php echo json_encode($svhtml['graph'][14]['players']); ?>,
                <?php echo json_encode($svhtml['graph'][15]['players']); ?>,
                <?php echo json_encode($svhtml['graph'][16]['players']); ?>,
                <?php echo json_encode($svhtml['graph'][17]['players']); ?>,
                <?php echo json_encode($svhtml['graph'][18]['players']); ?>,
                <?php echo json_encode($svhtml['graph'][19]['players']); ?>,
                <?php echo json_encode($svhtml['graph'][21]['players']); ?>,
                <?php echo json_encode($svhtml['graph'][22]['players']); ?>,
                <?php echo json_encode($svhtml['graph'][23]['players']); ?>,
                <?php echo json_encode($svhtml['graph'][24]['players']); ?>,
              ]
            },
          ]
        };
        var areaChartData2 = {
          labels: ["1am","2am","3am","4am","5am","6am","7am","8am","9am","10am","11am","12am","1pm","2pm","3pm","4pm","5pm","6pm","7pm","8pm","9pm","10pm","11pm","12am"],
          datasets: [
            {
              label: "Upload",
              fillColor: "rgba(210, 214, 222, 1)",
              strokeColor: "rgba(210, 214, 222, 1)",
              pointColor: "rgba(210, 214, 222, 1)",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: [
                <?php echo json_encode($svhtml['graph'][1]['upload']); ?>,
                <?php echo json_encode($svhtml['graph'][2]['upload']); ?>,
                <?php echo json_encode($svhtml['graph'][3]['upload']); ?>,
                <?php echo json_encode($svhtml['graph'][4]['upload']); ?>,
                <?php echo json_encode($svhtml['graph'][5]['upload']); ?>,
                <?php echo json_encode($svhtml['graph'][6]['upload']); ?>,
                <?php echo json_encode($svhtml['graph'][7]['upload']); ?>,
                <?php echo json_encode($svhtml['graph'][8]['upload']); ?>,
                <?php echo json_encode($svhtml['graph'][9]['upload']); ?>,
                <?php echo json_encode($svhtml['graph'][10]['upload']); ?>,
                <?php echo json_encode($svhtml['graph'][11]['upload']); ?>,
                <?php echo json_encode($svhtml['graph'][12]['upload']); ?>,
                <?php echo json_encode($svhtml['graph'][13]['upload']); ?>,
                <?php echo json_encode($svhtml['graph'][14]['upload']); ?>,
                <?php echo json_encode($svhtml['graph'][15]['upload']); ?>,
                <?php echo json_encode($svhtml['graph'][16]['upload']); ?>,
                <?php echo json_encode($svhtml['graph'][17]['upload']); ?>,
                <?php echo json_encode($svhtml['graph'][18]['upload']); ?>,
                <?php echo json_encode($svhtml['graph'][19]['upload']); ?>,
                <?php echo json_encode($svhtml['graph'][21]['upload']); ?>,
                <?php echo json_encode($svhtml['graph'][22]['upload']); ?>,
                <?php echo json_encode($svhtml['graph'][23]['upload']); ?>,
                <?php echo json_encode($svhtml['graph'][24]['upload']); ?>,
              ]
            },
            {
              label: "Download",
              fillColor: "#357CA5",
              strokeColor: "#357CA5",
              pointColor: "#357CA5",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: [
                <?php echo json_encode($svhtml['graph'][1]['download']); ?>,
                <?php echo json_encode($svhtml['graph'][2]['download']); ?>,
                <?php echo json_encode($svhtml['graph'][3]['download']); ?>,
                <?php echo json_encode($svhtml['graph'][4]['download']); ?>,
                <?php echo json_encode($svhtml['graph'][5]['download']); ?>,
                <?php echo json_encode($svhtml['graph'][6]['download']); ?>,
                <?php echo json_encode($svhtml['graph'][7]['download']); ?>,
                <?php echo json_encode($svhtml['graph'][8]['download']); ?>,
                <?php echo json_encode($svhtml['graph'][9]['download']); ?>,
                <?php echo json_encode($svhtml['graph'][10]['download']); ?>,
                <?php echo json_encode($svhtml['graph'][11]['download']); ?>,
                <?php echo json_encode($svhtml['graph'][12]['download']); ?>,
                <?php echo json_encode($svhtml['graph'][13]['download']); ?>,
                <?php echo json_encode($svhtml['graph'][14]['download']); ?>,
                <?php echo json_encode($svhtml['graph'][15]['download']); ?>,
                <?php echo json_encode($svhtml['graph'][16]['download']); ?>,
                <?php echo json_encode($svhtml['graph'][17]['download']); ?>,
                <?php echo json_encode($svhtml['graph'][18]['download']); ?>,
                <?php echo json_encode($svhtml['graph'][19]['download']); ?>,
                <?php echo json_encode($svhtml['graph'][21]['download']); ?>,
                <?php echo json_encode($svhtml['graph'][22]['download']); ?>,
                <?php echo json_encode($svhtml['graph'][23]['download']); ?>,
                <?php echo json_encode($svhtml['graph'][24]['download']); ?>,
              ]
            },
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
          bezierCurve: false,
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
        areaChart2.Line(areaChartData2, areaChartOptions);

        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
        var lineChart = new Chart(lineChartCanvas);
        var lineChartOptions = areaChartOptions;
        lineChartOptions.datasetFill = false;
        lineChart.Line(areaChartData, lineChartOptions);

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [
          {
            value: 700,
            color: "#f56954",
            highlight: "#f56954",
            label: "Chrome"
          },
          {
            value: 500,
            color: "#00a65a",
            highlight: "#00a65a",
            label: "IE"
          },
          {
            value: 400,
            color: "#f39c12",
            highlight: "#f39c12",
            label: "FireFox"
          },
          {
            value: 600,
            color: "#00c0ef",
            highlight: "#00c0ef",
            label: "Safari"
          },
          {
            value: 300,
            color: "#3c8dbc",
            highlight: "#3c8dbc",
            label: "Opera"
          },
          {
            value: 100,
            color: "#d2d6de",
            highlight: "#d2d6de",
            label: "Navigator"
          }
        ];
        var pieOptions = {
          //Boolean - Whether we should show a stroke on each segment
          segmentShowStroke: true,
          //String - The colour of each segment stroke
          segmentStrokeColor: "#fff",
          //Number - The width of each segment stroke
          segmentStrokeWidth: 2,
          //Number - The percentage of the chart that we cut out of the middle
          percentageInnerCutout: 50, // This is 0 for Pie charts
          //Number - Amount of animation steps
          animationSteps: 100,
          //String - Animation easing effect
          animationEasing: "easeOutBounce",
          //Boolean - Whether we animate the rotation of the Doughnut
          animateRotate: true,
          //Boolean - Whether we animate scaling the Doughnut from the centre
          animateScale: false,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true,
          // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: true,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData, pieOptions);

        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = areaChartData;
        barChartData.datasets[1].fillColor = "#00a65a";
        barChartData.datasets[1].strokeColor = "#00a65a";
        barChartData.datasets[1].pointColor = "#00a65a";
        var barChartOptions = {
          //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
          scaleBeginAtZero: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: true,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - If there is a stroke on each bar
          barShowStroke: true,
          //Number - Pixel width of the bar stroke
          barStrokeWidth: 2,
          //Number - Spacing between each of the X value sets
          barValueSpacing: 5,
          //Number - Spacing between data sets within X values
          barDatasetSpacing: 1,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to make the chart responsive
          responsive: true,
          maintainAspectRatio: true
        };

        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, barChartOptions);

      });
    </script>
  </body>
</html>
