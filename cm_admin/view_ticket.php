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
            Reply Ticket
            <small>Manage Tickets</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Ticket #1</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Ticket #1314222 </h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				<div class="box-body">

					<div class="col-md-10">
					<table class="table table-bordered">
                    <tr>
                      
                    </tr>
                    <tr>
					<td>Last Update</td>
                      <td><span class="badge bg-green">1 hours ago</span></td>
                    </tr>
                    <tr>
                      <td>Locale</td>
                      <td><img src='./images/langs/hu.png'></img> Hungary</td>
                    </tr>
                    <tr>
                      <td>Server / Port</td>
                      <td><a>31.170.165.211:36971</a></td>
                    </tr>
                    <tr>
                      <td>Username</td>
                      <td>csendesm</td>
                    </tr>
					<tr>
					<td>Package</td>
                      <td><span class="badge bg-yellow"><i class="fa fa-user"></i> Gold</span></td>
                    </tr>
					<tr>
					<td>Client</td>
                      <td><a href="view_user.php">Csendes Marcell</a> sqpp15@gmail.com&nbsp;&nbsp;<i class="fa fa-user"></i> <a>Client Area</a></td>
                    </tr>
					<tr>
					<td>Set Ticket</td>
                      <td>
					  <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked> 
                      Open
					  <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"> 
                      On Hold&nbsp;
					  <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3"> 
                      Closed
                    </td>
                    </tr>
					<tr>
					<td>Ticket History</td>
                      <td>[2015-09-24 18:59:13] Client opened a ticket</td>
                    </tr>
                  </table>
				  </div>
				  
				  <div class="col-md-9">
              <div class="box box-success">
                <div class="box-header with-border">
                  <p class="box-title"><a>google translate</a> | Posted by Customer, 2015-09-24 18:59:13 (From IP: <a>85.238.86.250</a>)</p>
  
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="mailbox-read-info">
                    <h3>FTP Problem</h3>
                    <h5>From: <a>Csendes Marcell</a> <span class="mailbox-read-time pull-right">2015-09-24 18:59:13</span></h5>
                  </div><!-- /.mailbox-read-info -->
                  <div class="mailbox-read-message">
                    <p>Hello Support,</p><br />
                    <p>Somewhy i cannot access FTP panel, please may could you upload my maps??</p><br />
					<p>Sincerely,</p>
					<p>Cs. Marcell</p>
                  </div><!-- /.mailbox-read-message -->
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <ul class="mailbox-attachments clearfix">
                    <li>
                      <span class="mailbox-attachment-icon"><i class="fa fa-file-zip-o"></i></span>
                      <div class="mailbox-attachment-info">
                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> maps.zip</a>
                        <span class="mailbox-attachment-size">
                          45 MB
                          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-check-square"></i> Virus Total</a>
                        </span>
                      </div>
                    </li>
                  </ul>
                </div><!-- /.box-footer -->
                <div class="box-footer">
                  <button class="btn btn-default"><i class="fa fa-print"></i> Print</button>
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
            </div><!-- /.col -->
			
                <form action="replyticket_c.php" method="post">
                  <div class="box-body">
                    <div class="form-group">
				   <div class="row">
					<div class="col-md-10">
                <div class="box-body pad">
				
                  <form>
                    <textarea id="Ticket" name="Ticket" rows="10" cols="80">
                    </textarea>
                  </form>
                </div>
				
              </div><!-- /.box -->
			  
                  </div><!-- /.box-body -->
				   
				  
                  <div class="box-footer">
				  <div class="form-group pull-center">
                      <label for="exampleInputFile">Attachment(s)</label>
                      <input type="file" id="exampleInputFile">
                      <p class="help-block">ZIP, JPG, PNG, LUA files are allowed</p>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Send</button>
                  </div>
                </form>
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
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
	<!-- CK Editor -->
	<script src="//cdn.ckeditor.com/4.5.3/standard/ckeditor.js"></script>
    <!-- AdminLTE App -->
    <script src="./dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="./dist/js/demo.js" type="text/javascript"></script>
	<script type="text/javascript">
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('Ticket');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
  </body>
</html>
