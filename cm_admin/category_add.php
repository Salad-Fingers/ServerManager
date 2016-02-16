<?php

include('./includes/functions.php');
if(isset($_POST['submit'])) {
	if(isset($_POST['CatName'])) {
		addCategory($_POST['ID'], $_POST['CatName'],$_POST['CatDesc']);
		header("Location: categories.php");
	} else {
		echo "<button class='btn btn-block btn-warning btn-sm'>Please choose a category name before you add it.</button>";
		include('addcat.php');
	}
} else {
	header("Location: addcat.php");
}
?>