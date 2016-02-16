<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Basic CMS - Admin Area</title>
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
            Lua Script Installer
            <small>Tools</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Lua Script Installer</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		<div class='panel box box-dark text-center'>
			<div class='box-header with-border text-center'>
                        <h4 class='box-title'>
                          <a>
                            Doctor Who (Tardis)
                          </a>
                        </h4>
            
		</div>
				<div class="row">
				 <section class="content">
				<div class="col-md-5">
					<div class="panel box box-primary">
                      <div class="box-header">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Screenshots
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="box-body">
                      
                  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                      <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="item active">
                        <img src="http://i.imgur.com/Z352K34.png" alt="First slide">
                      </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                      <span class="fa fa-angle-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                      <span class="fa fa-angle-right"></span>
                    </a>
                  </div>
				 </div>
                 </div>
              </div><!-- /.box -->
            </div><!-- /.col -->
			<div class="row">
				<div class="col-md-6">
					<div class="panel box box-success">
                      <div class="box-header">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseSec">
                            Information
                          </a>
                        </h4>
                      </div>
                      <div id="collapseSec" class="panel-collapse collapse in">
                        <div class="box-body text-left">
                      <p><b>Features:</b></p>
						√ Travel the whole of the map with your very own TARDIS!<br/>
						√ Do tricks like opening locks with your sonic screwdriver!<br/>
						√ Be a Dalek and exte-erminate others!<br/>
						√ Regenerate your body!<br/><br/>

					  <p><b>Technical details:</b></p>
						• An admin list - admins grant players sonic screwdrivers, TARDISes and regenerations<br/>
						• !give tardis <id> - give the player with the ID id a TARDIS<br/>
						• !give sonic <id> - give the player with the ID id a sonic screwdriver<br/>
						• !give regen <amount> <id> - give the player with the ID id <amount> regenerations<br/>
						• F2 while in a TARDIS to open the controls menu<br/>
						• F4 while playing as a CT to open your sonic screwdriver menu<br/>
						• F4 while playing as a Dalek to play the "Exterminate!" sound<br/>
						• If your health is down to 10 or less HP you'll start regenerating - find a safe place to do that as you'll be immobile<br/>
						• While using the sonic screwdriver you have to face the entity you'll be triggering<br/><br/><br/>
						 <a><i class="fa fa-info"></i><b> More info </b></a><a> | <i class="fa fa-download"></i><b> Download</b></a>
						
                  </div>
				  </div>
				 </div>
				 </div>
				 </div>
				 <div class="col-md-5">
					<div class="panel box box-warning">
                      <div class="box-header">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThr">
                            Details
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThr" class="panel-collapse collapse in">
                        <div class="box-body text-left">	
						<table class="table table-bordered">
                    <tr>
                      
                    </tr>
                    <tr>
					<td>Last Update</td>
                      <td><span class="badge bg-blue">2011.05.16</span></td>
                    </tr>
					<tr>
					<td>Likes</td>
                      <td><span class="badge bg-green"><i class="fa fa-thumbs-up"></i> 30 Likes</span></td>
                    </tr>
					<tr>
                      <td>Disk Usage</td>
                      <td>1,14 MB</td>
                    </tr>
					<tr>
					<td>Written by</td>
                      <td><i class="fa fa-user"></i> <a href="http://unrealsoftware.de/profile.php?userid=7749" target="_blank">EngiN33R</a></td>
                    </tr>
					<tr>
					<td>Installed Times</td>
                      <td>55</td>
                    </tr>
					<tr>
					<td>Last Installation</td>
                      <td>2015-09-24</td>
                    </tr>
                  </table>
						</div>
					  </div>
				 </div>
				 </div>
				 <div class="col-md-6">
					<div class="panel box box-danger">
                      <div class="box-header">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4rd">
                            Install
                          </a>
                        </h4>
                      </div>
                      <div id="collapse4rd" class="panel-collapse collapse in">
                        <div class="box-body text-left">
						<table class="table table-bordered">
                    <tr>
                      
                    </tr>
                    <tr>
					<td><label for="svName">Admin USGN ID</label></td>
                      <td><div class="input-group">
                    <span class="input-group-addon"><img src="http://unrealsoftware.de/img/pub/unrealsoftware_icon.gif"></img></span>
                    <input type="text" class="form-control" name="svName" placeholder="6493" />
                    </div></td>
                    </tr>
					<tr>
					<td>Destiantion Server</td>
					<td><div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-server"></i></span>
                      <select class="form-control" name="svOwner">
						<option>Unreal Software Test</option>
                      </select>
                    </div></td>
					</tr>
					<td>Install</td>
                      <td><button class="btn btn-block btn-success">Install</button></td>
                    </tr>

                  </table>
                    
                    
						
                  </div>
				  </div>
				 </div>
				 </div>
			</div>
		
		
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
  </body>
</html>
