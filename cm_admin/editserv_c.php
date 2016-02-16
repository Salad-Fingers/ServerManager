<?php

include('./includes/functions.php');
if(isset($_POST['submit'])) {
	if(isset($_POST['svName'])) {
		editServer($_POST['svID'], $_POST['svName'],$_POST['svPort'],$_POST['svMP'],$_POST['svDir'],$_POST['id']);
		header("Location: servers.php");
	} else {
		echo "<button class='btn btn-block btn-warning btn-sm'>Please choose a category name before you add it.</button>";
		include('addserver.php');
	}
} else {
	header("Location: addserver.php");
}
?>