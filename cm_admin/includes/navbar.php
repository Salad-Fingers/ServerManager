<?php 
$user = getUser($_SESSION['user']);
	$id = $user["ID"];
?>
     <div class="wrapper">

	 <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>s</b>M</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Server</b>Manager</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
			<li class="treeview">
			  <a href="../posts.php">
              </i> <span>View Site</span></i>
              </a>
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">1</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 1 message</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="http://unrealsoftware.de/<?php getUSGNavatar($id);?>" class="img-circle" alt="User Image" />
                          </div>
                          <h4>
                            <?php getUSGNname($id);?>
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Not the beste zoob liek</p>
                        </a>
                      </li><!-- end message -->
                    </ul>
                  </li>
                  <li class="footer"><a href="messages.php">See All Messages</a></li>
                </ul>
              </li>
			  