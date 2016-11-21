<?php
session_start();
$user = $_POST['username'];
$pass = $_POST['password'];

if (($user=='admin') && ($pass=='a4g47j0y3r14')) {
	$_SESSION['logged_admin_in'] = true;
	header("location: private.php");
	exit;
} else if (($user=='admin2') && ($pass=='41r3y0j74g4a')) {
	$_SESSION['logged_admin_in'] = true;
	header("location: private.php");
	exit;
} else	{
   	header("location: index.php");
   	exit;
}
?>