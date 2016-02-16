<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);


include('includes/functions.php');
session_start();   
if(isset($_POST['login'])) {
	if(isset($_POST['username'])) {
		if(isset($_POST['password'])) {
			$username = $_POST['username'];
			$query = mysql_query("SELECT * FROM cm_users WHERE Username = '$username'") or die(mysql_error());
			$user = mysql_fetch_array($query);
			// ReCaptcha
			
			// continue
			if(md5($_POST['password']) == $user['Password']) {
				echo "Login successful";
                $_SESSION['user'] = $user['Username'];
				$curl = curl_init();
			
			curl_setopt_array($curl, [
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
				CURLOPT_POST => 1,
				CURLOPT_POSTFIELDS => [
					'secret' => '6Ld1KQwTAAAAAI3TerARX8g7e_RhfGu2vI9t_weo',
					'response' => $_POST['g-recaptcha-response'],
				],
			]);
			
			$response = json_decode(curl_exec($curl));
			
			if (!$response->success) {
				// Redirect with error
			}
                header("Location: redirect.php");
			} else {
                echo "<button class='btn btn-block btn-warning btn-sm'>Please check your login details.</button>";
                include('login.php');
			}
			} else {
				echo "<button class='btn btn-block btn-warning btn-sm'>Please check that you filled out the login form!</button>";
				include('login.php');
			}
	}
}
?>