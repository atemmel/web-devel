<?php
	require "require/file.php";
	require "require/db.php";

	$name = $_POST["name"];
	$text = $_POST["text"];

	$id = $_POST["id"];

	$name_db = $_POST["namedb"];
	$text_db = $_POST["textdb"];

	function loadFromFile()
	{
		global $name, $text, $id;
		date_default_timezone_set("Europe/Brussels");

		if(isset($name) && isset($text) )
		{
			//Anti cancer
			$name = htmlspecialchars($name, ENT_QUOTES);
			$text = htmlspecialchars($text, ENT_QUOTES);

			$data = base64_encode(serialize(array($name, $text, date("Y-m-d d:h:s") ) ) ) . PHP_EOL;

			$file = new File("db.txt");
			$file->write($data, "a");

			header("location:index.php");
			die();
		}

		if(isset($id) );
		{
			$file = new File("db.txt");
			$file->delete($id);
		}

		header("location:index.php");
	}

	function loadFromDb()
	{
		$db = new DB();
		global $name_db, $text_db;
		$db->insert($name_db, $text_db);
	}

	if(isset($name) && isset($text) || isset($id) ) loadFromFile();
	if(isset($name_db) && isset($text_db) ) loadFromDb();
?>
