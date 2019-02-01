<?php
	require "require/create.php";
	check_login();
?>
<!DOCTYPE html>
<html lang="en">
<?php
	echo create_head("Hem");
?>
<body>
<?php
	echo create_navigation();

	echo open_main("Hem");
?>
	<ol>
		<li>
			<b class="q">Har du tidigare erfarenhet av utveckling med PHP?</b>
			<b class="a">Ja</b>
		</li>
		<li>
			<b class="q">Hur har du valt att strukturera upp dina filer och kataloger?</b>
			<b class="a">Kataloger skapas enbart efter behov. När flera filer av samma ändelse tvingas koexistera på samma 
djup så flyttas dessa istället till en separat katalog där de samlas. Undantaget till denna regel är själva bassidorna, som
all adelar filändelse men för enkelhetens skull får ligga i själva roten på projektet.</b>
		</li>
		<li>
			<b class="q">Har du följt guiden, eller skapat på egen hand?</b>
			<b class="a">Jag har skapat på egen hand.</b>
		</li>
		<li>
			<b class="q">Har du gjort några förbättringar eller vidareutvecklingar av guiden (om du följt denna)?</b>
			<b class="a">-</b>
		</li>
		<li>
			<b class="q">Vilken utvecklingsmiljö har du använt för uppgiften (Editor, webbserver etcetera)?</b>
			<b class="a">All textredigering har skett i neovim, medans all utveckling av PHP-komponenterna skett mot en 
extern server.</b>
		</li>
		<li>
			<b class="q">Har något varit svårt med denna uppgift?</b>
			<b class="a">So far so good.</b>
		</li>
	</ol>

<?php
	echo close_main();
?>
</body>
</html>
