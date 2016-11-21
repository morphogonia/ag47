<?php
session_start();
$user = $_POST['username'];
$pass = $_POST['password'];

if (($user=='client') && ($pass=='123client456')) {
	$_SESSION['logged_in'] = true;
	header("location: private.php");
	exit;
} else	{
   	header("location: index.php");
   	exit;
}
?>