<?php 
$user = getUser($_SESSION['user']);
	$id = $user["ID"];
?>

<!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
			<div class="pull-left image">
              <img src="http://unrealsoftware.de/<?php getUSGNavatar($id);?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php getUSGNname($id);?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
 
			<ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Home</span></i>
              </a>
			<li class="treeview">
              <a href="clients.php">
                <i class="fa fa-users"></i> <span>Manage Clients</span> <small class="label pull-right bg-yellow"></small>
              </a>
            </li>
			<li class="treeview">
              <a href="orders.php">
                <i class="fa fa-shopping-cart"></i> <span>Manage Orders</span> <small class="label pull-right bg-yellow"></small>
              </a>
            </li>
			<li class="treeview">
			  <a href="servers.php">
			    <i class="fa fa-server"></i> <span>Manage Servers</span> <small class="label pull-right bg-blue"><?php getServersNum();?></small> 
              </a>
			</li>
			<li class="Invoices">
              <a href="invoices.php">
                <i class="fa fa-credit-card"></i> <span>Invoices</span> <small class="label pull-right bg-blue"></small>
              </a>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-support"></i>
                <span>Support</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="tickets.php"><i class="fa fa-envelope"></i> Tickets</a></li>
                <li><a href="knowledgebase.php"><i class="fa fa-book"></i> Knowledgebase</a></li>
				<li><a href="posts.php"><i class="fa fa-newspaper-o"></i> Announcements</a></li>
				<li><a href="categories.php"><i class="fa fa-circle-o"></i> Categories</a></li>
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-gear"></i>
                <span>Configuration</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="settings.php"><i class="fa fa-cogs"></i> General</a></li>
				<li><a href="#"><i class="fa fa-envelope"></i> Email Settings</a></li>
				<li><a href="packages.php"><i class="fa fa-dropbox"></i> Package Manager</a></li>
				<li><a href="users.php"><i class="fa fa-user"></i> Staff Manager</a></li>
                <li><a href="#"><i class="fa fa-file-text-o"></i> Logs</a></li>
              </ul>
            </li>		
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Statistics</span>
              </a>
            </li>
			

            
           
            
</ul>
</section>
<!-- /.sidebar -->
 </aside>
	  
	  
