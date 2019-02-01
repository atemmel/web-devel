<?php
	function create_head($site)
	{
		return
			'<head>
				<meta charset="UTF-8">
				<title>Lab3: ' .  $site . '</title>
				<link rel="stylesheet" type="text/css" href="index.css">
				<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> 
			</head>';
			
	}

	function create_navigation()
	{
		return 
			'<div id="navigation">
				<a href="index.php"><div class="navigation-element">Hem </div></a>
				<a href="about.php"><div class="navigation-element">Om </div></a>
			</div>';
	}
	
	function open_main($site)
	{
		return 
			'<div id="main-container">
				<div id="document">
					<div class="align-center">
						<h1>' . $site . '</h1>
					</div>';

	}

	function close_main()
	{
		return 
				'</div>
				<div id="footer" class="align-center">
					<div class="dark-circle"></div>
					<div class="dark-circle"></div>
					<div class="dark-circle"></div>
				</div>
			</div>';
	}

	function check_login()
	{
		session_start();
		if($_SESSION["logged_in"] == 0) 
		{
			header("location:login.php");
		}
	}
?>
