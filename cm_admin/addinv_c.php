<?php

include('./includes/functions.php');
if(isset($_POST['submit'])) {
	if(isset($_POST['invAmount'])) {
		addInvoice($_POST['invID'], $_POST['invClient'], $_POST['invAmount'],$_POST['invCreated'],$_POST['invDue'],$_POST['invStatus']);
		header("Location: invoices.php");
	} else {
		echo "<button class='btn btn-block btn-warning btn-sm'>Please add some configuration before you add server.</button>";
		include('addinvoice.php');
	}
} else {
	header("Location: addinvoice.php");
}
?>