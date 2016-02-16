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

	// Report all PHP errors
	error_reporting(E_ALL);
	
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
            View User
            <small>User</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">View User</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
		<div class='col-md-12 col-sm-6 col-xs-6 text-left'>
				 <div class='panel box box-success'>
                      <div class='box-header with-border'>
                        <h4 class='box-title'>
                          <a data-toggle='collapse' data-parent='#accordion' href='#collapseOne'>
                           <i class="fa fa-user"></i> View Client Details
                          </a>
                        </h4>
                      </div>
                      <div id='collapseOne' class='panel-collapse collapse in'>
                        <div class='box-body'>
                        <table class="table table-bordered">
                    <tr>
                      
                    </tr>
                    <tr>
					<td>Package</td>
                      <td><span class="badge bg-yellow">Gold</span></td>
                    </tr>
					<tr>
					<td>CID</td>
                      <td>cID1</td>
                    </tr>
					<tr>
                      <td>Client Name</td>
                      <td>Csendes Marcell</td>
                    </tr>
					<tr>
					<td>Client Email</td>
                      <td>sqpp15@gmail.com</td>
                    </tr>
					<tr>
					<td>Country</td>
                      <td><img src="./images/langs/hu.png"></img> Hungary</td>
                    </tr>
					<tr>
					<td>Address</td>
                      <td>Tancsics ut 22. , Sajoszoged, Borsod Abauj Zemplen, 3599</td>
                    </tr>
					<tr>
					<td>Phone</td>
                      <td>+36304980168</td>
                    </tr>
					<tr>
					<td>Signup Date</td>
                      <td>2015-09-24</td>
                    </tr>
					<tr>
					<td>Notes</td>
                      <td>No</td>
                    </tr>
					<tr>
					<td>Status</td>
                      <td><span class="badge bg-green">Active</span></td>
                    </tr>
                  </table>
                </div>
            </div>
        </div>
		<div class="row">
		<div class='col-md-12 col-sm-6 col-xs-6 text-center'>
				 <div class='panel box box-danger'>
                      <div class='box-header with-border'>
                        <h4 class='box-title'>
                          <p>
                           <i class="fa fa-user"></i> Actions
                          </p>
                        </h4>
                      </div>
                      <div>
                        <div class='box-body'>
                       <a class="btn btn-app" href="#">
					   <i class="fa fa-envelope"></i> Tickets
					   </a>
					   <a class="btn btn-app" href="#">
					   <i class="fa fa-credit-card"></i> Invoices
					   </a>
					   <a class="btn btn-app" href="#">
					   <i class="fa fa-user-plus"></i> Login as Client
					   </a>
					   <a class="btn btn-app" href="#">
					   <i class="fa fa-book"></i> History
					   </a>
					   <a class="btn btn-app" href="#">
					   <i class="fa fa-minus-circle"></i> Suspend
					   </a>
					   <a class="btn btn-app" href="#">
					   <i class="fa fa-remove"></i> Delete Client
					   </a>
					   
                        </div>
                      </div>
                    </div>
		</div>
		
		<div class='col-md-12 col-sm-6 col-xs-6'>
				 <div class='panel box box-info'>
                      <div class='box-header with-border'>
                        <h4 class='box-title'>
                          <p>
                           <i class="fa fa-server"></i> Serverlist
                          </p>
                        </h4>
                      </div>
                      <div>
                        <div class='box-body'>
					<table class="table table-bordered">
                    <tr>
                      <th>Status</th>
                      <th>Name</th>
                      <th>IP:Port</th>
					  <th>Login</th>
                      <th>Action</th>
                    </tr>
					<td style="padding-top:30px"><span class="badge bg-green">Active</span></td>
					<td style="padding-top:30px">Unreal Software Test</td>
					<td style="padding-top:30px">191.67.12.66:36967</td>
					<td style="padding-top:30px">csendesm</td>
					<td>
					<a class="btn btn-app" href="#">
					   <i class="fa fa-info"></i> Info
					   </a>
					   <a class="btn btn-app" href="#">
					   <i class="fa fa-book"></i> History
					   </a>
					   <a class="btn btn-app" href="#">
					   <i class="fa fa-folder-open"></i> File Manager
					   </a>
					   <a class="btn btn-app" href="#">
					   <i class="fa fa-edit"></i> Edit
					   </a>
					   <a class="btn btn-app" href="#">
					   <i class="fa fa-toggle-on"></i> Suspend/Activate
					   </a>
					   <a class="btn btn-app" href="#">
					   <i class="fa fa-floppy-o"></i> Backups
					   </a>   
					</td>
                  </table>
					   
                        </div>
                      </div>
                    </div>
			</div>
			<div class='col-md-12 col-sm-6 col-xs-6'>
				 <div class='panel box box-info'>
                      <div class='box-header with-border'>
                        <h4 class='box-title'>
                          <p>
                           <i class="fa fa-shopping-cart"></i> Orders
                          </p>
                        </h4>
                      </div>
                      <div>
                        <div class='box-body'>
					<table class="table table-bordered">
                    <tr>
                      <th>Order ID</th>
                      <th>Price</th>
                      <th>Status</th>
					  <th>Created at</th>
                      <th>Action</th>
                    </tr>
					<td style="padding-top:30px">#26</td>
					<td style="padding-top:30px">$5 (Monthly)</td>
					<td style="padding-top:30px"><span class="badge bg-green">Active</span></td>
					<td style="padding-top:30px">2015-09-24</td>
					<td>
					<a class="btn btn-app" href="#">
					   <i class="fa fa-shopping-cart"></i> View Order
					   </a>
					</td>
                  </table>
					   
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
