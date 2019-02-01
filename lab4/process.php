<?php
$name = $_POST["name"];
$text = $_POST["text"];

if(!isset($name) || !isset($text) ) 
{
	header("location:index.php");
	die();
}

$file = fopen("db.txt", "w");
fwrite($file, $name . ',' $text);
?>
