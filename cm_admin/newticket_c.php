<?php
include('./includes/functions.php');

if(isset($_POST['submit'])) {
	if(isset($_POST['Subject'])) {
		if(isset($_POST['Ticket'])) {
			newTicket($_POST['ID'],$_POST['Department'],$_POST['Subject'],$_POST['Ticket']);
			require_once('./class.phpmailer.php');
			$mail             = new PHPMailer(); // defaults to using php "mail()"
			$mail->IsSendmail(); // telling the class to use SendMail transport

			$body             = $_POST['Ticket'];
			$body             = eregi_replace("[\]",'',$body);

			$mail->SetFrom('info@cs2dservices.com', 'ServerManager');

			$address = "sqpp15@gmail.com";
			$mail->AddAddress($address, "ServerManager Support");
			$mail->Subject    = "[ServerManager Support] " . $_POST['Subject'];
			$mail->MsgHTML($body);
			if(!$mail->Send()) {
			  echo "Mailer Error: " . $mail->ErrorInfo;
				}
		
			header("Location: tickets.php");
		} else {
			echo "Please edit it Marcell";
		}
		} else {
			echo "please set a post name!";
			include('newticket.php');
		}
} else {
	header("Location: newticket.php");
}
?>