<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ServerManager - Admin Area</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="./dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="./dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
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
          <h1>
            Dashboard
            <small>Statistics</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Small boxes (Stat box) -->
		  <?php 
		  $posts = mysql_query("SELECT * FROM cm_posts") or die(mysql_error());
		  if(mysql_num_rows($posts) == 0) {
		  echo"<div class='alert alert-warning alert-dismissable'>
		  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          <h4><i class='icon fa fa-warning'></i>Post Warning!</h4>
		  You haven't got any post. Just go to Content Managment -> Posts page to and Click to Add Post button to create post.
          <br /><br />
		  #System
		  </div>";  
		  }
		  $catnum = mysql_query("SELECT * FROM cm_categories") or die(mysql_error());
		  if(mysql_num_rows($catnum) == 0) {
		  echo"<div class='alert alert-error alert-dismissable'>
		  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          <h4><i class='icon fa fa-warning'></i>Category Error!</h4>
		  You haven't got any category. Please add at least one to start build your website.
          <br /><br />
		  #System
		  </div>"; }?>
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php getOrdersNum();?></h3>
                  <p>Orders</p>
                </div>
                <div class="icon">
                  <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="orders.php" class="small-box-footer">Manage
                <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
			 </div>
		    <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
               <div class="inner">
                  <h3><?php getClientsNum();?></h3>
                  <p>Clients</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="clients.php" class="small-box-footer">Manage
                <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
			  
			 </div>
			<!-- user number stat -->
			<div class="col-lg-3 col-xs-6">
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php getTicketsNum();?></h3>
                  <p>Tickets</p>
                </div>
                <div class="icon">
                  <i class="fa fa-envelope"></i>
                </div>
                <a href="tickets.php" class="small-box-footer">Manage
                <i class="fa fa-arrow-circle-right"></i>
				</a>
              </div>
			</div>
			  <!--user cat stat -->
			<div class="col-lg-3 col-xs-6">
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php getServersNum();?></h3>
                  <p>Servers</p>
                </div>
                <div class="icon">
                  <i class="fa fa-server"></i>
                </div>
                <a href="servers.php" class="small-box-footer">Manage
                <i class="fa fa-arrow-circle-right"></i>
				</a>
              </div><br /><br />
			 </div><!-- /.row -->
			<section class="content">
			<div class="row">
            <div class="col-xs-12">
              <!-- jQuery Knob -->
              <div class="box box-solid">
                <div class="box-header text-center">
                  <i class="fa fa-bar-chart-o"></i>
                  <h3 class="box-title">System Information</h3>
                </div><!-- /.box-header -->
				<?php 
				//cpu stat
				$prevVal = shell_exec("cat /proc/stat");
				$prevArr = explode(' ',trim($prevVal));
				$prevTotal = $prevArr[2] + $prevArr[3] + $prevArr[4] + $prevArr[5];
				$prevIdle = $prevArr[5];
				usleep(0.15 * 1000000);
				$val = shell_exec("cat /proc/stat");
				$arr = explode(' ', trim($val));
				$total = $arr[2] + $arr[3] + $arr[4] + $arr[5];
				$idle = $arr[5];
				$intervalTotal = intval($total - $prevTotal);
				$stat['cpu'] =  intval(100 * (($intervalTotal - ($idle - $prevIdle)) / $intervalTotal));
				$cpu_result = shell_exec("cat /proc/cpuinfo | grep model\ name");
				$stat['cpu_model'] = strstr($cpu_result, "\n", true);
				$stat['cpu_model'] = str_replace("","", $stat['cpu_model']);
				//memory stat
				$stat['mem_percent'] = round(shell_exec("free | grep Mem | awk '{print $3/$2 * 100.0}'"), 2);
				$mem_result = shell_exec("cat /proc/meminfo | grep MemTotal");
				$stat['mem_total'] = round(preg_replace("#[^0-9]+(?:\.[0-9]*)?#", "", $mem_result) / 1024 / 1024, 3);
				$mem_result = shell_exec("cat /proc/meminfo | grep MemFree");
				$stat['mem_free'] = round(preg_replace("#[^0-9]+(?:\.[0-9]*)?#", "", $mem_result) / 1024 / 1024, 3);
				$stat['mem_used'] = $stat['mem_total'] - $stat['mem_free'];
				//hdd stat
				$stat['hdd_free'] = round(disk_free_space("/") / 1024 / 1024 / 1024, 2);
				$stat['hdd_total'] = round(disk_total_space("/") / 1024 / 1024/ 1024, 2);
				$stat['hdd_used'] = $stat['hdd_total'] - $stat['hdd_free'];
				$stat['hdd_percent'] = round(sprintf('%.2f',($stat['hdd_used'] / $stat['hdd_total']) * 100), 2);
				//network stat
				$stat['network_rx'] = round(trim(file_get_contents("/sys/class/net/eth0/statistics/rx_bytes")) / 1024/ 1024/ 1024, 2);
				$stat['network_tx'] = round(trim(file_get_contents("/sys/class/net/eth0/statistics/tx_bytes")) / 1024/ 1024/ 1024, 2);
				
				$divide = $stat['network_tx'] / $stat['network_rx'];
				//output headers
				header('Content-type: text/json');
				header('Content-type: application/json');
				//output data by json
				 
				
				echo "
				
				 <div class='panel box box-dark text-center'>
                      <div class='box-header with-border text-center'>
                        <h4 class='box-title'>
                          <a>
                            Operating System Information
                          </a>
                        </h4>
                      </div>
                      <div'>
                        <div class='box-body'>
                        <b>Hostname:</b> " . php_uname(n) ."<br/>
						<b>OS:</b> " . php_uname(s) ."<br/>
						<b>Kernel:</b> " . php_uname(r) ."<br/>
						<b>Dist Build:</b> " . php_uname(v) ."<br/>
						<b>Instruction Set:</b> " . php_uname(m) ."<br/>
						<h4 class='box-title'>
                          <a>
                            Other Information
                          </a>
                        </h4>
						";
						
						date_default_timezone_set('Europe/Budapest');
						echo "<b>Time:</b> " . date("g:i:s A");
						echo "<br/><b>Date:</b> " . date("Y-m-d");
						echo "<br/><b>Timezone:</b> " . date_default_timezone_get();
						echo "
						<h4 class='box-title'>
                          <a>
                            Software Information
                          </a>
                        </h4>";
						echo "<b>Webserver:</b> " . $_SERVER['SERVER_SOFTWARE'];
						echo "<br/><b>PHP Version:</b> " . phpversion();
                        echo "</div>
                      </div>
                    
					
				<div class='col-md-3 col-sm-6 col-xs-6 text-center'>
				 <div class='panel box box-danger'>
                      <div class='box-header with-border'>
                        <h4 class='box-title'>
                          <a data-toggle='collapse' data-parent='#accordion' href='#collapseOne'>
                            CPU (Processor)
                          </a>
                        </h4>
                      </div>
                      <div id='collapseOne' class='panel-collapse collapse in'>
                        <div class='box-body'>
                        " . $stat['cpu_model'] . "
                        </div>
                      </div>
                    </div>
				</div>
				<div class='col-md-3 col-sm-6 col-xs-6 text-center'>
				 <div class='panel box box-success'>
                      <div class='box-header with-border'>
                        <h4 class='box-title'>
                          <a data-toggle='collapse' data-parent='#accordion' href='#collapseOne'>
                            Memory
                          </a>
                        </h4>
                      </div>
                      <div id='collapseOne' class='panel-collapse collapse in'>
                        <div class='box-body'>
                        Memory Total: ". $stat['mem_total'] ." GB <br/>
						Memory Used: ". $stat['mem_used'] ." GB <br/>
						Memory Free: ". $stat['mem_free'] ." GB <br/>
                        </div>
                      </div>
                    </div>
				</div><div class='col-md-3 col-sm-6 col-xs-6 text-center'>
				 <div class='panel box box-primary'>
                      <div class='box-header with-border'>
                        <h4 class='box-title'>
                          <a data-toggle='collapse' data-parent='#accordion' href='#collapseOne'>
                            Disk
                          </a>
                        </h4>
                      </div>
                      <div id='collapseOne' class='panel-collapse collapse in'>
                        <div class='box-body'>
                        HDD Total: ". $stat['hdd_total'] ." GB <br/>
						HDD Used: ". $stat['hdd_used'] ." GB <br/>
						HDD Free: ". $stat['hdd_free'] ." GB <br/>
                        </div>
                      </div>
                    </div>
				</div>
				<div class='col-md-3 col-sm-6 col-xs-6 text-center'>
				 <div class='panel box box-warning'>
                      <div class='box-header with-border'>
                        <h4 class='box-title'>
                          <a data-toggle='collapse' data-parent='#accordion' href='#collapseOne'>
                            Network
                          </a>
                        </h4>
                      </div>
                      <div id='collapseOne' class='panel-collapse collapse in'>
                        <div class='box-body'>
                        Traffic Sent: ". $stat['network_tx'] ." GB <br/>
						Traffic Received: ". $stat['network_rx'] ." GB <br/><br/>
                        </div>
                      </div>
                    </div>
				</div><br /><br /><br /><br /><br /><br />
				 
				 
				 <div class='box-body'>
				
                 
                    <div class='col-md-3 col-sm-6 col-xs-6 text-center'>
                      <input type='text' class='knob' value=". get_server_cpu_usage() ." data-width='90' data-height='90' data-fgColor='#f56954'>
                      <div class='knob-label'>(%)<br/>CPU Usage</div>
                    </div><!-- ./col -->
                    <div class='col-md-3 col-sm-6 col-xs-6 text-center'>
                      <input type='text' class='knob' value=". $stat['mem_percent'] ." data-width='90' data-height='90' data-fgColor='#00a65a'>
                      <div class='knob-label'>(%)<br/>Memory Usage</div>
                    </div><!-- ./col -->
                    <div class='col-md-3 col-sm-6 col-xs-6 text-center'>
                      <input type='text' class='knob' value=". $stat['hdd_percent'] ." data-width='90' data-height='90' data-fgColor='#00c0ef'>
                      <div class='knob-label'>(%)<br/>Space Usage</div>
                    </div><!-- ./col -->
					<div class='col-md-3 col-sm-6 col-xs-6 text-center'>
                      <input type='text' class='knob' value='15' data-width='90' data-height='90' data-fgColor='#FF6633'>
                      <div class='knob-label'>(%)<br/>Bandwith Usage</div>
                    </div><!-- ./col -->
                  </div><!-- /.row -->
                </div><!-- /.box-body -->
				
				</div>
				</section>"; 
				



/* Some possible outputs:
Linux localhost 2.4.21-0.13mdk #1 Fri Mar 14 15:08:06 EST 2003 i686
Linux

FreeBSD localhost 3.2-RELEASE #15: Mon Dec 17 08:46:02 GMT 2001
FreeBSD

Windows NT XN1 5.1 build 2600
WINNT
*/


		
        ?>
			
                    
                 
				
		  
	



        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

	<?php 
	  include("./includes/footer.php");
	  include("./includes/asidebar.php");
	 ?>
    </div><!-- ./wrapper -->
	
    <!-- jQuery 2.1.4 -->
    <script src="./plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="./bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="./plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="./plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="./dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="./dist/js/demo.js" type="text/javascript"></script>
    <!-- jQuery Knob -->
    <script src="./plugins/knob/jquery.knob.js"></script>
    <!-- Sparkline -->
    <script src="./plugins/sparkline/jquery.sparkline.min.js"></script>
	
	    <script>
      $(function () {
        /* jQueryKnob */

        $(".knob").knob({
          /*change : function (value) {
           //console.log("change : " + value);
           },
           release : function (value) {
           console.log("release : " + value);
           },
           cancel : function () {
           console.log("cancel : " + this.value);
           },*/
          draw: function () {

            // "tron" case
            if (this.$.data('skin') == 'tron') {

              var a = this.angle(this.cv)  // Angle
                      , sa = this.startAngle          // Previous start angle
                      , sat = this.startAngle         // Start angle
                      , ea                            // Previous end angle
                      , eat = sat + a                 // End angle
                      , r = true;

              this.g.lineWidth = this.lineWidth;

              this.o.cursor
                      && (sat = eat - 0.3)
                      && (eat = eat + 0.3);

              if (this.o.displayPrevious) {
                ea = this.startAngle + this.angle(this.value);
                this.o.cursor
                        && (sa = ea - 0.3)
                        && (ea = ea + 0.3);
                this.g.beginPath();
                this.g.strokeStyle = this.previousColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                this.g.stroke();
              }

              this.g.beginPath();
              this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
              this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
              this.g.stroke();

              this.g.lineWidth = 2;
              this.g.beginPath();
              this.g.strokeStyle = this.o.fgColor;
              this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
              this.g.stroke();

              return false;
            }
          }
        });
        /* END JQUERY KNOB */

        //INITIALIZE SPARKLINE CHARTS
        $(".sparkline").each(function () {
          var $this = $(this);
          $this.sparkline('html', $this.data());
        });

        /* SPARKLINE DOCUMENTAION EXAMPLES http://omnipotent.net/jquery.sparkline/#s-about */
        drawDocSparklines();
        drawMouseSpeedDemo();

      });
      function drawDocSparklines() {

        // Bar + line composite charts
        $('#compositebar').sparkline('html', {type: 'bar', barColor: '#aaf'});
        $('#compositebar').sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7],
                {composite: true, fillColor: false, lineColor: 'red'});


        // Line charts taking their values from the tag
        $('.sparkline-1').sparkline();

        // Larger line charts for the docs
        $('.largeline').sparkline('html',
                {type: 'line', height: '2.5em', width: '4em'});

        // Customized line chart
        $('#linecustom').sparkline('html',
                {height: '1.5em', width: '8em', lineColor: '#f00', fillColor: '#ffa',
                  minSpotColor: false, maxSpotColor: false, spotColor: '#77f', spotRadius: 3});

        // Bar charts using inline values
        $('.sparkbar').sparkline('html', {type: 'bar'});

        $('.barformat').sparkline([1, 3, 5, 3, 8], {
          type: 'bar',
          tooltipFormat: '{{value:levels}} - {{value}}',
          tooltipValueLookups: {
            levels: $.range_map({':2': 'Low', '3:6': 'Medium', '7:': 'High'})
          }
        });

        // Tri-state charts using inline values
        $('.sparktristate').sparkline('html', {type: 'tristate'});
        $('.sparktristatecols').sparkline('html',
                {type: 'tristate', colorMap: {'-2': '#fa7', '2': '#44f'}});

        // Composite line charts, the second using values supplied via javascript
        $('#compositeline').sparkline('html', {fillColor: false, changeRangeMin: 0, chartRangeMax: 10});
        $('#compositeline').sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7],
                {composite: true, fillColor: false, lineColor: 'red', changeRangeMin: 0, chartRangeMax: 10});

        // Line charts with normal range marker
        $('#normalline').sparkline('html',
                {fillColor: false, normalRangeMin: -1, normalRangeMax: 8});
        $('#normalExample').sparkline('html',
                {fillColor: false, normalRangeMin: 80, normalRangeMax: 95, normalRangeColor: '#4f4'});

        // Discrete charts
        $('.discrete1').sparkline('html',
                {type: 'discrete', lineColor: 'blue', xwidth: 18});
        $('#discrete2').sparkline('html',
                {type: 'discrete', lineColor: 'blue', thresholdColor: 'red', thresholdValue: 4});

        // Bullet charts
        $('.sparkbullet').sparkline('html', {type: 'bullet'});

        // Pie charts
        $('.sparkpie').sparkline('html', {type: 'pie', height: '1.0em'});

        // Box plots
        $('.sparkboxplot').sparkline('html', {type: 'box'});
        $('.sparkboxplotraw').sparkline([1, 3, 5, 8, 10, 15, 18],
                {type: 'box', raw: true, showOutliers: true, target: 6});

        // Box plot with specific field order
        $('.boxfieldorder').sparkline('html', {
          type: 'box',
          tooltipFormatFieldlist: ['med', 'lq', 'uq'],
          tooltipFormatFieldlistKey: 'field'
        });

        // click event demo sparkline
        $('.clickdemo').sparkline();
        $('.clickdemo').bind('sparklineClick', function (ev) {
          var sparkline = ev.sparklines[0],
                  region = sparkline.getCurrentRegionFields();
          value = region.y;
          alert("Clicked on x=" + region.x + " y=" + region.y);
        });

        // mouseover event demo sparkline
        $('.mouseoverdemo').sparkline();
        $('.mouseoverdemo').bind('sparklineRegionChange', function (ev) {
          var sparkline = ev.sparklines[0],
                  region = sparkline.getCurrentRegionFields();
          value = region.y;
          $('.mouseoverregion').text("x=" + region.x + " y=" + region.y);
        }).bind('mouseleave', function () {
          $('.mouseoverregion').text('');
        });
      }

      /**
       ** Draw the little mouse speed animated graph
       ** This just attaches a handler to the mousemove event to see
       ** (roughly) how far the mouse has moved
       ** and then updates the display a couple of times a second via
       ** setTimeout()
       **/
      function drawMouseSpeedDemo() {
        var mrefreshinterval = 500; // update display every 500ms
        var lastmousex = -1;
        var lastmousey = -1;
        var lastmousetime;
        var mousetravel = 0;
        var mpoints = [];
        var mpoints_max = 30;
        $('html').mousemove(function (e) {
          var mousex = e.pageX;
          var mousey = e.pageY;
          if (lastmousex > -1) {
            mousetravel += Math.max(Math.abs(mousex - lastmousex), Math.abs(mousey - lastmousey));
          }
          lastmousex = mousex;
          lastmousey = mousey;
        });
        var mdraw = function () {
          var md = new Date();
          var timenow = md.getTime();
          if (lastmousetime && lastmousetime != timenow) {
            var pps = Math.round(mousetravel / (timenow - lastmousetime) * 1000);
            mpoints.push(pps);
            if (mpoints.length > mpoints_max)
              mpoints.splice(0, 1);
            mousetravel = 0;
            $('#mousespeed').sparkline(mpoints, {width: mpoints.length * 2, tooltipSuffix: ' pixels per second'});
          }
          lastmousetime = timenow;
          setTimeout(mdraw, mrefreshinterval);
        };
        // We could use setInterval instead, but I prefer to do it this way
        setTimeout(mdraw, mrefreshinterval);
      }
    </script>
  </body>
</html>
