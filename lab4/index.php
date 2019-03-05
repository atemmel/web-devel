<?php
	require "require/create.php";
	require "require/file.php";
	require "require/db.php";

	error_reporting(-1);
	ini_set('display_errors', 'On');

	$file = new File("db.txt");
	$builder = new Builder("Guestbook");
	$db = new DB();

	$data = explode(PHP_EOL, $file->read_all() );
	array_pop($data);

	$data_db = $db->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<?php
	echo $builder->create_head("Guestbook");
?>
<body>
<?php
	echo $builder->open_main("Guestbook");
?>
	<div class="align-center">
		<h3>Del 1</h3>
		<form action="process.php" method="post">
			<input maxlength='32' placeholder="Namn" type="text" name="name" required><br><br>
			<textarea rows="4" cols="20" maxlength="128" placeholder="Meddelande" name="text" required></textarea><br><br>
			<input type="submit">
		</form>
		<br>
<?php
		$i = 0;
		foreach($data as &$element)
		{
			$post = unserialize(base64_decode($element) );
			echo $builder->create_post($post[0], $post[1], $post[2], $i);
			$i++;
		}
?>
		<h3>Del 2</h3>
		<form action="process.php" method="POST">
			<input maxlength='32' placeholder="Namn" type="text" name="namedb" required><br><br>
			<textarea rows="4" cols="20" maxlength="128" placeholder="Meddelande" name="textdb" required></textarea><br><br>
			<input type="submit">
		</form>
		<br>
<?php
		foreach($data_db as &$element)
		{
			echo $builder->create_post_db($element[1], $element[2], $element[3], $element[0]);
		}
?>
	</div>
<?php
	echo $builder->close_main();
?>
</body>
</html>
