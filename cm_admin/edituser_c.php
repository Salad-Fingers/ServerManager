<?php

include('./includes/functions.php');
if(isset($_POST['submit'])) {
	if(isset($_POST['Username'])) {
		editUser($_POST['ID'], $_POST['Username'], $_POST['Email'], $_POST['Password'], $_POST['Full_Name'], $_POST['rights'], $_POST['USGN'], $_POST['id']);
		header("Location: users.php");
	} else {
		echo "<button class='btn btn-block btn-warning btn-sm'>Please choose a category name before you add it.</button>";
		include('adduser.php');
	}
} else {
	header("Location: adduser.php");
}
?>