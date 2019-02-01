<?php
	require "require/create.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
	echo create_head("Guestbook");
?>
<body>
<?php
	echo open_main("Guestbook");
?>
	<div class="align-center">
		<h3>Del 1</h3>
		<form action="process.php" method="post">
			<input placeholder="Namn" type="text" name="name"><br><br>
			<input placeholder="Meddelande" type="password" name="text"><br><br>
			<input type="submit">
		</form>
	</div>
<?php
	echo close_main();
?>
</body>
</html>
