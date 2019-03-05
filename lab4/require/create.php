<?php
	class Builder
	{
		private $site;
		public function __construct($sitename)
		{
			$this->site = $sitename;
		}

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

		function create_post($author, $text, $date, $id)
		{
			return 
				"<div>
					Inlägg av " . $author . ": " . $text . ", den " . $date .
					"<form class='delete-form' action='process.php' method='post'>
						<input type='hidden' name='id' value='" . $id . "'>
						<input type='submit' value='&#128937;' class='delete'>
					</form>
				</div>";
		}

		function create_post_db($author, $text, $date, $id)
		{
			return 
				"<div>
					Inlägg av " . $author . ": " . $text . ", den " . $date .
					"<form class='delete-form' action='process.php' method='post'>
						<input type='hidden' name='iddb' value='" . $id . "'>
						<input type='submit' value='&#128937;' class='delete'>
					</form>
				</div>";
		}
	}
?>
