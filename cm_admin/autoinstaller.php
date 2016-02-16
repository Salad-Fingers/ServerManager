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
                            Administration Tools
                          </a>
                        </h4>
            </div>
		</div>
		<div class="row">
						<div class="col-md-3 col-sm-6 col-xs-12">
						  <div class="info-box">
							<span class="info-box-icon bg-aqua"><i class="fa fa-wrench"></i></span>
							<div class="info-box-content"><a class="pull-right"><i class="fa fa-info"></i> More info</a>
							  <span class="info-box-text"><b>Starkzz's Admin Script</b></span>
							  <p><i class="fa fa-user"></i> Written by Starkzz</p>
							  <span class="info-box-number text-green"><i class="fa fa-thumbs-up"></i> 144<a class="pull-right"><i class="fa fa-flash"></i> Install</a></span>
							</div><!-- /.info-box-content -->
						  </div><!-- /.info-box -->
						</div><!-- /.col -->
						<div class="col-md-3 col-sm-6 col-xs-12">
						  <div class="info-box">
							<span class="info-box-icon bg-green"><i class="fa fa-wrench"></i></span>
							<div class="info-box-content"><a class="pull-right"><i class="fa fa-info"></i> More info</a>
							  <span class="info-box-text"><b>The Admin Script Final</b></span>
							  <p><i class="fa fa-user"></i> Written by CrazyBooy</p>
							  <span class="info-box-number text-green"><i class="fa fa-thumbs-up"></i> 287<a class="pull-right"><i class="fa fa-flash"></i> Install</a></span>
							</div><!-- /.info-box-content -->
						  </div><!-- /.info-box -->
						</div><!-- /.col -->
						<div class="col-md-3 col-sm-6 col-xs-12">
						  <div class="info-box">
							<span class="info-box-icon bg-yellow"><i class="fa fa-wrench"></i></span>
							<div class="info-box-content"><a class="pull-right"><i class="fa fa-info"></i> More info</a>
							  <span class="info-box-text"><b>HC Admin Script</b></span>
							  <p><i class="fa fa-user"></i> Written by Happy Camper</p>
							  <span class="info-box-number text-green"><i class="fa fa-thumbs-up"></i> 198<a class="pull-right"><i class="fa fa-flash"></i> Install</a></span>
							</div><!-- /.info-box-content -->
						  </div><!-- /.info-box -->
						</div><!-- /.col -->
						<div class="col-md-3 col-sm-6 col-xs-12">
						  <div class="info-box">
							<span class="info-box-icon bg-red"><i class="fa fa-wrench"></i></span>
							<div class="info-box-content"><a class="pull-right"><i class="fa fa-info"></i> More info</a>
							  <span class="info-box-text"><b>Bass Powertool</b></span>
							  <p><i class="fa fa-user"></i> Written by Yank</p>
							  <span class="info-box-number text-green"><i class="fa fa-thumbs-up"></i> 29<a class="pull-right"><i class="fa fa-flash"></i> Install</a></span>
							</div><!-- /.info-box-content -->
						  </div><!-- /.info-box -->
						</div><!-- /.col -->
					  </div><!-- /.row -->
		<div class='panel box box-dark text-center'>
			<div class='box-header with-border text-center'>
                        <h4 class='box-title'>
                          <a>
                            Multiplayer Gamemodes
                          </a>
                        </h4>
            </div>
		</div>
		<div class="row">
						<div class="col-md-3 col-sm-6 col-xs-12">
						  <div class="info-box">
							<span class="info-box-icon bg-purple"><i class="fa fa-wrench"></i></span>
							<div class="info-box-content">
							  <span class="info-box-text"><b>CS2D Tibia</b></span>
							  <p><i class="fa fa-user"></i> Written by goweiwen</p>
							  <span class="info-box-number text-green"><i class="fa fa-thumbs-up"></i> 297<a class="pull-right"><i class="fa fa-flash"></i> Install</a></span>
							</div><!-- /.info-box-content -->
						  </div><!-- /.info-box -->
						</div><!-- /.col -->
						<div class="col-md-3 col-sm-6 col-xs-12">
						  <div class="info-box">
							<span class="info-box-icon bg-orange"><i class="fa fa-wrench"></i></span>
							<div class="info-box-content">
							  <span class="info-box-text"><b>Zombie Plague</b></span>
							  <p><i class="fa fa-user"></i> Written by Simanas</p>
							  <span class="info-box-number text-green"><i class="fa fa-thumbs-up"></i> 182<a class="pull-right"><i class="fa fa-flash"></i> Install</a></span>
							</div><!-- /.info-box-content -->
						  </div><!-- /.info-box -->
						</div><!-- /.col -->
						<div class="col-md-3 col-sm-6 col-xs-12">
						  <div class="info-box">
							<span class="info-box-icon bg-black"><i class="fa fa-wrench"></i></span>
							<div class="info-box-content">
							  <span class="info-box-text"><b>GMOD</b></span>
							  <p><i class="fa fa-user"></i> Written by mafia_man</p>
							  <span class="info-box-number text-green"><i class="fa fa-thumbs-up"></i> 137<a class="pull-right"><i class="fa fa-flash"></i> Install</a></span>
							</div><!-- /.info-box-content -->
						  </div><!-- /.info-box -->
						</div><!-- /.col -->
						<div class="col-md-3 col-sm-6 col-xs-12">
						  <div class="info-box">
							<span class="info-box-icon bg-blue"><i class="fa fa-wrench"></i></span>
							<div class="info-box-content">
							  <span class="info-box-text"><b>Doctor Who (Tardis)</b></span>
							  <p><i class="fa fa-user"></i> Written by EngiN33R</p>
							  <span class="info-box-number text-green"><i class="fa fa-thumbs-up"></i> 30<a class="pull-right"><i class="fa fa-flash"></i> Install</a></span>
							</div><!-- /.info-box-content -->
						  </div><!-- /.info-box -->
						</div><!-- /.col -->
						<div class="col-md-3 col-sm-6 col-xs-12">
						  <div class="info-box">
							<span class="info-box-icon bg-green"><i class="fa fa-wrench"></i></span>
							<div class="info-box-content">
							  <span class="info-box-text"><b>Minecraft</b></span>
							  <p><i class="fa fa-user"></i> Written by Taijfun</p>
							  <span class="info-box-number text-green"><i class="fa fa-thumbs-up"></i> 108<a class="pull-right"><i class="fa fa-flash"></i> Install</a></span>
							</div><!-- /.info-box-content -->
						  </div><!-- /.info-box -->
						</div><!-- /.col -->
						<div class="col-md-3 col-sm-6 col-xs-12">
						  <div class="info-box">
							<span class="info-box-icon bg-red"><i class="fa fa-wrench"></i></span>
							<div class="info-box-content">
							  <span class="info-box-text"><b>Call of Duty</b></span>
							  <p><i class="fa fa-user"></i> Written by Loooser</p>
							  <span class="info-box-number text-green"><i class="fa fa-thumbs-up"></i> 102<a class="pull-right"><i class="fa fa-flash"></i> Install</a></span>
							</div><!-- /.info-box-content -->
						  </div><!-- /.info-box -->
						</div><!-- /.col -->
						<div class="col-md-3 col-sm-6 col-xs-12">
						  <div class="info-box">
							<span class="info-box-icon bg-aqua"><i class="fa fa-wrench"></i></span>
							<div class="info-box-content">
							  <span class="info-box-text"><b>Space RPG</b></span>
							  <p><i class="fa fa-user"></i> Written by EngiN33R</p>
							  <span class="info-box-number text-green"><i class="fa fa-thumbs-up"></i> 93<a class="pull-right"><i class="fa fa-flash"></i> Install</a></span>
							</div><!-- /.info-box-content -->
						  </div><!-- /.info-box -->
						</div><!-- /.col -->
						<div class="col-md-3 col-sm-6 col-xs-12">
						  <div class="info-box">
							<span class="info-box-icon bg-grey"><i class="fa fa-wrench"></i></span>
							<div class="info-box-content">
							  <span class="info-box-text"><b>Roleplay</b></span>
							  <p><i class="fa fa-user"></i> Written by 3RROR</p>
							  <span class="info-box-number text-green"><i class="fa fa-thumbs-up"></i> 83<a class="pull-right"><i class="fa fa-flash"></i> Install</a></span>
							</div><!-- /.info-box-content -->
						  </div><!-- /.info-box -->
						</div><!-- /.col -->
					  </div><!-- /.row -->
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
