<?php
	require "require/secret.php";
	session_start();

	if($_POST["user"] == $correct_user && $_POST["pass"] == $correct_pass) 
	{
		$_SESSION["logged_in"] = 1;
		header("location:index.php");
	}
	else
	{
		$_SESSION["logged_in"] = 0;
		header("location:login.php");
	}
?>
