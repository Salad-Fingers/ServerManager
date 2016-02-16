<?php

include('./includes/functions.php');
if(isset($_POST['submit'])) {
	if(isset($_POST['pkgName'])) {
		addPackage($_POST['ID'], $_POST['pkgName'],$_POST['pkgType'],$_POST['pkgPayType'],$_POST['pkgSetup'],$_POST['pkgPrice']);
		header("Location: packages.php");
	} else {
		echo "<button class='btn btn-block btn-warning btn-sm'>Please choose a category name before you add it.</button>";
		include('addpackage.php');
	}
} else {
	header("Location: addpackage.php");
}
?>