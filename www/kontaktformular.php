<?php
require __DIR__.'/template/header.php';

$subject = '';

if (isset($_POST['subject'])) {
	$subject = $_POST['subject'];
}
?>
<form action="" method="POST">
	<input name="subject" value="<?php echo $subject; ?>" placeholder="Betreff"><br>
	<br>
	<textarea></textarea><br>
	<input name="send" type="submit" value="Absenden">
</form>

<?php
require __DIR__.'/template/footer.php';
