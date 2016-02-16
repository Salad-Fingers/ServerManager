<?php

include('./includes/functions.php');
if(isset($_POST['submit'])) {
	if(isset($_POST['svName'])) {
		addServer($_POST['ID'], $_POST['svOwner'], $_POST['svName'], $_POST['svPort'], $_POST['svMP'], $_POST['svDir'], $_POST['svrCON']);
		header("Location: servers.php");
	} else {
		echo "<button class='btn btn-block btn-warning btn-sm'>Please add some configuration before you add server.</button>";
		include('addserver.php');
	}
} else {
	header("Location: addserver.php");
}
?>