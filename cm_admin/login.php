<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ServerManager - Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="./plugins/iCheck/square/blue.css">

	<style>
	
	*{ margin: 0; padding: 0;}

	body {
		/*To hide the horizontal scroller appearing during the animation*/
		overflow: hidden;
	}

	#clouds{
		padding: 100px 0;
		background: #33CCFF;
		background: -webkit-linear-gradient(top, #33CCFF 0%, #fff 100%);
		background: -linear-gradient(top, #33CCFF 0%, #fff 100%);
		background: -moz-linear-gradient(top, #33CCFF 0%, #fff 100%);
	}

	/*Time to finalise the cloud shape*/
	.cloud {
		width: 200px; height: 60px;
		background: #fff;
		
		border-radius: 200px;
		-moz-border-radius: 200px;
		-webkit-border-radius: 200px;
		
		position: relative; 
	}

	.cloud:before, .cloud:after {
		content: '';
		position: absolute; 
		background: #fff;
		width: 100px; height: 80px;
		position: absolute; top: -15px; left: 10px;
		
		border-radius: 100px;
		-moz-border-radius: 100px;
		-webkit-border-radius: 100px;
		
		-webkit-transform: rotate(30deg);
		transform: rotate(30deg);
		-moz-transform: rotate(30deg);
	}

	.cloud:after {
		width: 120px; height: 120px;
		top: -55px; left: auto; right: 15px;
	}

	/*Time to animate*/
	.x1 {
		-webkit-animation: moveclouds 15s linear infinite;
		-moz-animation: moveclouds 15s linear infinite;
		-o-animation: moveclouds 15s linear infinite;
	}

	/*variable speed, opacity, and position of clouds for realistic effect*/
	.x2 {
		left: 200px;
		
		-webkit-transform: scale(0.6);
		-moz-transform: scale(0.6);
		transform: scale(0.6);
		opacity: 0.6; /*opacity proportional to the size*/
		
		/*Speed will also be proportional to the size and opacity*/
		/*More the speed. Less the time in 's' = seconds*/
		-webkit-animation: moveclouds 25s linear infinite;
		-moz-animation: moveclouds 25s linear infinite;
		-o-animation: moveclouds 25s linear infinite;
	}

	.x3 {
		left: -250px; top: -200px;
		
		-webkit-transform: scale(0.8);
		-moz-transform: scale(0.8);
		transform: scale(0.8);
		opacity: 0.8; /*opacity proportional to the size*/
		
		-webkit-animation: moveclouds 20s linear infinite;
		-moz-animation: moveclouds 20s linear infinite;
		-o-animation: moveclouds 20s linear infinite;
	}

	.x4 {
		left: 470px; top: -250px;
		
		-webkit-transform: scale(0.75);
		-moz-transform: scale(0.75);
		transform: scale(0.75);
		opacity: 0.75; /*opacity proportional to the size*/
		
		-webkit-animation: moveclouds 18s linear infinite;
		-moz-animation: moveclouds 18s linear infinite;
		-o-animation: moveclouds 18s linear infinite;
	}

	.x5 {
		left: -150px; top: -150px;
		
		-webkit-transform: scale(0.8);
		-moz-transform: scale(0.8);
		transform: scale(0.8);
		opacity: 0.8; /*opacity proportional to the size*/
		
		-webkit-animation: moveclouds 20s linear infinite;
		-moz-animation: moveclouds 20s linear infinite;
		-o-animation: moveclouds 20s linear infinite;
	}

	@-webkit-keyframes moveclouds {
		0% {margin-left: 1000px;}
		100% {margin-left: -1000px;}
	}
	@-moz-keyframes moveclouds {
		0% {margin-left: 1000px;}
		100% {margin-left: -1000px;}
	}
	@-o-keyframes moveclouds {
		0% {margin-left: 1000px;}
		100% {margin-left: -1000px;}
	}
	</style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
  </head>
  	<div id="clouds">
	<div class="cloud x1"></div>
	<!-- Time for multiple clouds to dance around -->
	<div class="cloud x2"></div>
	</div>
	<body>
	<?php
	require_once "./libs/recaptchalib.php";
	require_once "./includes/functions.php";
	if(isset($_SESSION['user'])) {
		header("Location: index.php");
	} else {
	
	?>
    <div class="login-box">
      <div class="login-logo">
      <b>Server</b>Manager</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="dologin.php" method="post">
          <div class="form-group has-feedback">
            <input type="username" name="username" class="form-control" placeholder="Username"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
		 <br />
          <div class="row">
            <div class="col-xs-4">
			<div class="g-recaptcha" data-sitekey="6Ld1KQwTAAAAAEocJy7sUDUw1TPjw2LtVJHaWcJY"></div><br />
			<button type="submit" name="login" value="Login" class="btn btn-primary btn-block btn-flat">Login</button>
            </div><!-- /.col --><br /><br /><br /><br /><br />
			<a>Support:</a><br />
			<a href="http://unrealsoftware.de" target="_blank"><img src="./images/unrealsoftware_micro.gif"></img></a>
          </div> 
		  
		  
			<?php
			
			foreach ($_POST as $key => $value) {
				echo '<p><strong>' . $key.':</strong> '.$value.'</p>';
			} ?>
        </form>
      </div><!-- /.login-box-body -->
	  
	</div><!-- /.login-box -->
    <!-- jQuery 2.1.4 -->
	<script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="./plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="./bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src=".plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
	<?php } ?>
  </body>
</html>
