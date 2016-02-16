<?php

include('./includes/functions.php');
if(isset($_POST['submit'])) {
	if(isset($_POST['invAmount'])) {
		editInvoice($_POST['invID'], $_POST['invAmount'],$_POST['invCreated'],$_POST['invDue'],$_POST['invStatus'],$_POST['id']);
		header("Location: invoices.php");
	} else {
		echo "<button class='btn btn-block btn-warning btn-sm'>Please choose a category name before you add it.</button>";
		include('addinvoice.php');
	}
} else {
	header("Location: addinvoice.php");
}
?>