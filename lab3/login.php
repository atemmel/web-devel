<?php
	require "require/create.php";
	require "require/secret.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
	echo create_head("Login");
?>
<body>
<?php
	echo open_main("Login");
?>
	<div class="align-center">
		<form action="process.php" method="post">
			<input placeholder="Username" type="text" name="user"><br><br>
			<input placeholder="Password" type="password" name="pass"><br><br>
			<input type="submit"><br><br>
<?php
	echo "User: $correct_user\n<br>";
	echo "Password: $correct_pass\n<br>";
?>
		</form>
	</div>
<?php
	echo close_main();
?>
</body>
</html>
