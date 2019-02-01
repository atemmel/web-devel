<?php
	require "require/create.php";
	check_login();
?>
<!DOCTYPE html>
<html lang="en">
<?php
	echo create_head("Info");
?>
<body>
<?php
	echo create_navigation();

	echo open_main("Info");
?>
	<ul>
		<li>
			<b>Datum klockslag:</b>
<?php
	date_default_timezone_set("Europe/Brussels"); 
	echo date("Y-m-d H:i:s");
?>
		</li>
		<li>
			<b>IP-adress:</b>
<?php
	echo $_SERVER["REMOTE_ADDR"];
?>
		</li>
		<li>
			<b>Sökväg/filnamn:</b>
<?php
	echo __FILE__;
?>
		</li>
		<li>
			<b>User agent-sträng:</b>
<?php
	echo $_SERVER['HTTP_USER_AGENT'];
?>
		</li>
	</ul>

<?php
	echo close_main();
?>
</body>
</html>
