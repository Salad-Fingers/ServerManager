<?php
include('cm_admin/includes/config.php');
include('cm_admin/includes/functions.php');
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);


function ViewPosts() {
	$query = mysql_query("SELECT * FROM cm_posts") or die(mysql_error());
	while($post = mysql_fetch_assoc($query)) {
		echo "<div class='col s12 m8 offset-m2 l6 offset-l3'>
		<nav><div class='nav-wrapper green'><h5 style='padding-left:10px; paddig-top:10px'>" . $post['Title'] . "</h5></div></nav>
        <div class='card-panel grey lighten-5 z-depth-1'>
          <div class='row valign-wrapper'>
		  
            <div class='col s2'>
              <img src='images/yuna.jpg' alt='' class='circle responsive-img'> <!-- notice the 'circle' class --><br />
            <div style='padding-left:15px'>" . $post['Author'] . "</div>
			</div>
            <div class='col s10'>
              <span class='black-text'>";
				echo  $post['Content'];
				
				echo "<div class='fb-share-button' data-href='#' data-layout='icon'></div><div class='right'>Posted on " . $post['PostedOn'] . "</div>";
				echo"</span>
            </div>
          </div>
        </div>
      </div><br />";
		
		
	}
}


?>