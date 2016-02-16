<?php

include('./includes/functions.php');
if(isset($_POST['submit'])) {
	if(isset($_POST['Username'])) {
		addUser($_POST['ID'], $_POST['Username'],$_POST['EMail'],$_POST['Password'],$_POST['Fullname'],$_POST['RegisterDate'],$_POST['Rights'],$_POST['USGN']);
		header("Location: users.php");
	} else {
		echo "<button class='btn btn-block btn-warning btn-sm'>You forgot to add username.</button>";
		include('adduser.php');
	}
} else {
	header("Location: adduser.php");
}
?>