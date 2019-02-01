<?php
	require "require/create.php";
	require "require/file.php";
	error_reporting(-1);
	ini_set('display_errors', 'On');

	$file = new File("db.txt");
	$builder = new Builder("Guestbook");
	$data = explode(PHP_EOL, $file->read_all() );
	array_pop($data);
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
			<input placeholder="Namn" type="text" name="name"><br><br>
			<input placeholder="Meddelande" type="text" name="text"><br><br>
			<input type="submit">
		</form>
		<br>
<?php
		$i = 1;
		foreach($data as &$element)
		{
			$post = unserialize($element);
			echo $builder->create_post($post[0], $post[1], $post[2], $i);
			$i++;
		}
?>
	</div>
<?php
	echo $builder->close_main();
?>
</body>
</html>
