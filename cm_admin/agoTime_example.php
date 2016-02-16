<?php
include_once("classes/develop_php_library.php"); // Include the class library
$timeAgoObject = new convertToAgo; // Create an object for the time conversion functions
// Query your database here and get timestamp
$ts = "2015-09-24 00:19:18";
$convertedTime = ($timeAgoObject -> convert_datetime($ts)); // Convert Date Time
$when = ($timeAgoObject -> makeAgo($convertedTime)); // Then convert to ago time
?>

<h2><?php echo $when; ?></h2>