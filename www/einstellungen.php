<?php

require __DIR__.'/template/header.php';

if ($angemeldeterBenutzer === '') {
	echo '<b style="color:red;">Du musst angemeldet sein!</b>';
} else {
	$fullName = trim(file_get_contents(__DIR__.'/../'.$angemeldeterBenutzer.'.fullname.txt'));

	if (isset($_POST['fullname'])) {
		$fullName = $_POST['fullname'];

		file_put_contents(__DIR__.'/../'.$angemeldeterBenutzer.'.fullname.txt', $fullName.PHP_EOL);
	}
?>
<h4>Hallo <?=htmlspecialchars($fullName, ENT_QUOTES);?>!</h4>
	<form action="" method="POST">
		<input name="fullname" value="<?=htmlspecialchars($fullName, ENT_QUOTES);?>">
		<input type="submit" value="Meinen Namen ändern">
</form>
<?php
}
require __DIR__.'/template/footer.php';
?>
