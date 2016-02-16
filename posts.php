<!DOCTYPE html>
 <?php
  include("includes/functions.php");
?>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>ServerManager - Materialize Design</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script>
  
   $(document).ready(function(){
		$('.collapsible').collapsible({
		  accordion : true // A setting that changes the collapsible behavior to expandable instead of the default accordion style
		});
   });
  </script>
</head>
<body>
<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/hu_HU/sdk.js#xfbml=1&version=v2.4";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo"><b>Basic</b>CMS</a>
      <ul class="right hide-on-med-and-down">
		<li><a href="./index.php">Home</a></li>
		<li><a href="./cm_forum/">Forum</a></li>
        <li><a href="/cm_admin/index.php">Demo</a></li>
		<li><a href="./posts.php">Blog</a></li>
		<li><a href="./servers.php">Servers</a></li>
		<li><a href="./screenshots.php">Screenshots</a></li>
		<li><a href="./changelog.php">Changelog</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="./index.php">Home</a></li>
		<li><a href="./cm_forum/">Forum</a></li>
        <li><a href="/cm_admin/index.php">Demo</a></li>
		<li><a href="./posts.php">Blog</a></li>
		<li><a href="./servers.php">Servers</a></li>
		<li><a href="./screenshots.php">Screenshots</a></li>
		<li><a href="./changelog.php">Changelog</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
  <div class="container">
 <?php
  viewPosts(); 
  ?>
</div>

  </div>
</nav>
  <footer class="page-footer green darken-3">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">About ServerManager</h5>
          <p class="grey-text text-lighten-4">Curabitur iaculis interdum porttitor. Donec volutpat quis felis non interdum. Vestibulum in bibendum felis, sit amet ullamcorper dolor. Phasellus porta pellentesque sem, ac sagittis lacus accumsan sed. Proin egestas risus at sagittis vehicula. Vivamus pulvinar ex at pulvinar egestas. Curabitur ullamcorper condimentum rhoncus. Donec rutrum, mi sit amet tristique sodales, lacus elit accumsan turpis, at mollis nibh justo a libero. Ut sed elit arcu. </p>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      2015 | All Rights Reserved | Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a> & developed by Csendes Marcell
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
