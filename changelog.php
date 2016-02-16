<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>ServerManager - Materialize Design</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


  <script>
  
  </script>
</head>
<body>
<span class="label label-success">Default Label</span>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo"><b>Server</b>Manager</a>
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
      <div id="introduction" class="section scrollspy">
        <h4>Changelog</h4>
        <p class="caption">
          You will bee see the future updates, changes, fixes here. If you are interested in it you can come back to see more.
        </p>
        <ul class="collapsible collapsible-accordion" data-collapsible="accordion">
          <li>
            <div class="collapsible-header active"><i class="material-icons">error_outline</i><b>Alpha 0.0.7</b> - 2015-09-06</div>
            <div class="collapsible-body"><p><img src="./images/clog_changed.png"></img> Updated AdminLTE Framework<br /><img src="./images/clog_fixed.png"></img>  USGN Avatar & Username issue (Thanks for @user mafia_man: fixing the issue)<br /><img src="./images/clog_added.png"></img>  Input fields beside icons</p></div>
          </li>
          <li>
            <div class="collapsible-header"><i class="material-icons">error_outline</i><b>Alpha 0.0.6</b> - 2015-09-03</div>
            <div class="collapsible-body"><p><img src="./images/clog_changed.png"></img> USGN ID Avatar & Name Support<br /><img src="./images/clog_added.png"></img>  Some UI changes<br /><img src="./images/clog_info.png"></img> Performance Improvements</p></div>
          </li>
          <li>
            <div class="collapsible-header"><i class="material-icons">error_outline</i><b>Alpha 0.0.5</b> - 2015-09-02</div>
            <div class="collapsible-body"><p><img src="./images/clog_added.png"></img> Restarting servers<br /><img src="./images/clog_added.png"></img> OneClick LuaScript Installer</p></div>
          </li>
		  <li>
            <div class="collapsible-header"><i class="material-icons">error_outline</i><b>Alpha 0.0.4</b> - 2015-09-01</div>
            <div class="collapsible-body"><p><img src="./images/clog_info.png"></img> Performance Improvements<br /><img src="./images/clog_fixed.png"></img> Some bugs fixed</p></div>
          </li>
		  <li>
            <div class="collapsible-header"><i class="material-icons">error_outline</i><b>Alpha 0.0.3</b> - 2015-08-07</div>
            <div class="collapsible-body"><p><img src="./images/clog_added.png"></img> News managment for admin area<br /><img src="./images/clog_changed.png"></img> CKEditor updated to 4.5.2 Full Package</p></div>
          </li>
		  <li>
            <div class="collapsible-header"><i class="material-icons">error_outline</i><b>Alpha 0.0.2</b> - 2015-08-06</div>
            <div class="collapsible-body"><p><img src="./images/clog_added.png"></img> Adding categories from Admin Area<br /><img src="./images/clog_added.png"></img> Adding post with CKEditor from Admin Area<br ><img src="./images/clog_changed.png"></img> Posts changed to Content Managment (now it has to submenu: post, categories)</p></div>
          </li>
		   <li>
            <div class="collapsible-header"><i class="material-icons">error_outline</i><b>Alpha 0.0.1</b> - 2015-08-02</div>
            <div class="collapsible-body"><p><img src="./images/clog_added.png"></img> Admin Login Page with AdminLTE2 Framework<br /><img src="./images/clog_added.png"></img> Default Coming Soon Page with Materialize Framewor<br /><img src="./images/clog_added.png"></img> MD5 Encryption for Password<br /><img src="./images/clog_added.png"></img> Redirect page for admin area login.<br /><img src="./images/clog_added.png"></img> Number of posts on sidebar<br /><img src="./images/clog_added.png"></img> Deleting post by button<br /><img src="./images/clog_fixed.png"></img> Login problem with new Framework</p></div>
          </li>
        </ul>
      </div>


    </div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
       

        

        
      </div>

    </div>
    <br><br>

    <div class="section">

    </div>
  </div>

  <footer class="page-footer green darken-3">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">About ServerManager</h5>
          <p class="grey-text text-lighten-4">Its not just a usual-system, this php-software integrates social-networks and other everyday websites into one to make your work and projects easier than ever.</p>
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
