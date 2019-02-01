<?php
	require "require/file.php";

	$name = $_POST["name"];
	$text = $_POST["text"];

	if(!isset($name) || !isset($text) ) 
	{
		header("location:index.php");
		die("Ojoj");
	}

	$data = serialize(array($name, $text, date("Y-m-d d:h:s") ) ) . PHP_EOL;

	$file = new File("db.txt");
	$file->write($data);

	header("location:index.php");
?>
