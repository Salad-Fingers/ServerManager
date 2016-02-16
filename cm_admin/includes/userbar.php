<?php 
$user = getUser($_SESSION['user']);
	$id = $user["ID"];
?>
<!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="http://unrealsoftware.de/<?php getUSGNavatar($id);?>" class="user-image" alt="User Image" />
                  <span class="hidden-xs"><?php getUSGNname($id);?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="http://unrealsoftware.de/<?php getUSGNavatar($id);?>" class="img-circle" alt="User Image" />
                    <p>
                      <?php getUSGNname($id);?> - Owner
                      <small>Member since 2015.08.01</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
					<div class="col-xs-4">
                      <a href="#">History</a>
                    </div>
                    <div class="col-xs-4">
                     <a href="#">Karma</a>
                    </div>
                    <div class="col-xs-4">
                      <a href="#">Friends</a>
                    </div>
                  </li>
			
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>