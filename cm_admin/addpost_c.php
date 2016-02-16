<?php
include('./includes/functions.php');

if(isset($_POST['submit'])) {
	if(isset($_POST['PostName'])) {
		if(isset($_POST['PostContent'])) {
			addPost($_POST['PostName'],$_POST['PostAuth'],$_POST['PostContent'],$_POST['PostCats']);
			header("Location: posts.php");
		} else {
			echo "Please edit it Marcell";
		}
		} else {
			echo "please set a post name!";
			include('addcat.php');
		}
} else {
	header("Location: addcat.php");
}
?>