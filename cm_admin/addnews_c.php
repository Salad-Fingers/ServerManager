<?php
include('./includes/functions.php');

if(isset($_POST['submit'])) {
	if(isset($_POST['Sender'])) {
		if(isset($_POST['Content'])) {
			addNews($_POST['date(Y-m-d)'],$POST['date(H:m)'],$_POST['Sender'],$_POST['mCat'],$_POST['Content']);
			header("Location: news.php");
		} else {
			echo "Please edit it Marcell";
		}
		} else {
			echo "please set a post name!";
			include('addnews.php');
		}
}
?>