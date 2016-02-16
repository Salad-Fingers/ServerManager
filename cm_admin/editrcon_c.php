<?php

include('./includes/functions.php');
if(isset($_POST['submit'])) {
	if(isset($_POST['svRCON'])) {
		editRCON($_POST['svID'], $_POST['svRCON'],$_POST['id']);
		header("Location: servers.php");
	} else {
		echo "<button class='btn btn-block btn-warning btn-sm'>Please choose a category name before you add it.</button>";
		include('editrcon.php');
	}
} else {
	header("Location: editrcon.php");
}
?>