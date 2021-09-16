<?php
require __DIR__.'/template/header.php';
?>

<form action="" method="POST">
	<input name="username" placeholder="Benutzername"><br>
	<input name="password" type="password" placeholder="Kennwort"><br>
	<br>
	<input name="login" type="submit" value="Anmelden">
</form>

<?php

$benutzer = [
	#12345678
	'tim' => '$2y$10$sAXwLRAARMMrjAQZMqBkBueSGrNVohxs8ZYN6RwJafuXYLZ5ZmZJ',
	#adminadmin
	'admin' => '$2y$10$R0otW4agAqEXdnHnbXC7O.KKcwm1eyJ.bTQgGJA6ufXyew..oC5jm' 
];

if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	if (!isset($benutzer[$username])) {
		echo '<b style="color:red;">Ich kenne den Benutzer "'.$username.'" nicht!</b>';
	} else if (!password_verify($password, $benutzer[$username])) {
		echo '<b style="color:red;">Ungültiges Passwort!</b>';
	} else {
		echo '<b style="color:green;">Erfolgreich angemeldet!</b>';

		$randomBytes = openssl_random_pseudo_bytes(16);
		$randomToken = '';

		for ($i = 0; $i < strlen($randomBytes); ++$i) {
			$randomToken .= str_pad(dechex(ord($randomBytes[$i])), 2, '0');
		}

		$data = $username.','.$randomToken.PHP_EOL;

		file_put_contents(__DIR__.'/../cookie_tabelle.csv', $data, FILE_APPEND);

		setcookie('token', $randomToken);
		header('Location: /einstellungen.php');
	}
}

require __DIR__.'/template/footer.php';
