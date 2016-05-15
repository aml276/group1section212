<?php
print'
	<form method="post" action="add_email.php" name="add_email"><br>
	Sign up for the mailing list:<br>
	Email: <input type="text" name="email"><br>
	<input type="submit" name="submit" value="Submit">
	<br>
	</form>

';
if (isset($_POST['submit'])){
	include ('config.php');
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$email = $mysqli->real_escape_string(htmlentities(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING)));
	$result = $mysqli->query("INSERT INTO EmailList VALUES ('$email')");
	if($result == FALSE)
		echo $mysqli->error;
	$mysqli->close();
}
?>