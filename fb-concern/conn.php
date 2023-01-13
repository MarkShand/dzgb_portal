<?php 
	$conn = mysqli_connect('localhost','root','','dzgb_portal');
	if (!$conn) {
		die("Connection Failed!".mysqli_errno());
	}
	$ip = $_SERVER['REMOTE_ADDR'];
?>