<?php
ob_start();

$angemeldeterBenutzer = '';

// token Cookie gesetzt?
if (isset($_COOKIE['token'])) {
	$cookie_tabelle = file(__DIR__.'/../../cookie_tabelle.csv');

	foreach ($cookie_tabelle as $cookie_tabelle_eintrag) {
		list($benutzer, $token) = explode(',', $cookie_tabelle_eintrag, 2);

		if (trim($token) === $_COOKIE['token']) {
			$angemeldeterBenutzer = $benutzer;

			break;
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Meine Webseite</title>
	<style>
		body {
			padding: 50px;
			font-family: Verdana, Arial;
		}

		input {
			margin-top: 20px;
		}

		b {
			margin-top: 20px;
			display: block;
		}

		a {
			color: blue;
			text-decoration: none;
			margin: 0px 10px;
			display: inline-block;
		}

		a:hover {
			text-decoration: underline;
		}

		.menu {
			margin-bottom: 40px;
		}
	</style>
</head>
<body>
	<h1>Meine Webseite</h1>

	<div class="menu">
		<a href="/index.php">Startseite</a>
		<a href="/kontaktformular.php">Kontaktformular</a>
		<?php
		if ($angemeldeterBenutzer === '') {
			echo '<a href="/login.php">Anmelden</a>';
		} else {
			echo '<a href="/einstellungen.php">Einstellungen</a>';
			echo ' <a href="/logout.php">Abmelden</a>';
		}
		?>
	</div>
